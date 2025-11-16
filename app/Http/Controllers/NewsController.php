<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequests;
use App\Http\Requests\UpdateNewsRequests;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return  response()->json($news);
    }

    //Hien thi tin tuc moi nhat 
    public function displayFeaturedNews()
    {
        $new = News::orderBy('created_at', 'desc')->get();
        return response()->json($new);
    }

    public function store(StoreNewsRequests $request)
    {

        try {
            // Lấy dữ liệu đã validate
            $data = $request->validated();

            // Tạo tên ngẫu nhiên cho ảnh
            $imageName = Str::random(32) . '.' . $request->file('cover_image')->getClientOriginalExtension();

            // Lưu ảnh vào thư mục storage/app/public/news
            Storage::disk('public')->put(
                'news/' . $imageName,
                file_get_contents($request->file('cover_image'))
            );

            // Lưu thông tin tin tuc vào database
            $news = News::create([
                'title'     => $data['title'],
                'cover_image'     => 'news/' . $imageName,
            ]);

            return response()->json([
                'message' => 'Thêm tin tức mới thành công!',
                'news'  => $news,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Thêm tin tức thất bại!',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        $news = News::findOrFail($id);

        return response()->json($news);
    }
    public function showNewsBlocks($id)
    {

        $news = News::with('blocks')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $news
        ]);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa tin tức thành công',
            'deleted_id' => $id
        ]);
    }


    public function update(UpdateNewsRequests $request, $id)
    {

        try {
            $news = News::findOrFail($id);
            $data = $request->validated();

            if ($request->hasFile('cover_image')) {
                // Xóa ảnh cũ nếu tồn tại
                if ($news->cover_image && Storage::disk('public')->exists($news->cover_image)) {
                    Storage::disk('public')->delete($news->cover_image);
                }

                // Lưu ảnh mới
                $cover_image = $request->file('cover_image');
                $imageName = Str::random(32) . '.' . $cover_image->getClientOriginalExtension();
                $cover_image->storeAs('news', $imageName, 'public');
                $data['cover_image'] = 'news/' . $imageName;
            }

            $news->update($data);

            return response()->json([
                'message' => 'Cập nhật tin tức thành công!',
                'news' => $news,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Cập nhật tin tức thất bại!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function search(Request $request)
    {

        $title = trim($request->query('title'));

        if (!$title) {
            return response()->json(News::all());
        }

        $news = News::where('title', 'LIKE', '%' . $title . '%')
            // chỉ lấy những tin tức chứa cụm từ gần giống nhất
            ->orderByRaw(
                "CASE 
            WHEN title LIKE ? THEN 1
            WHEN title LIKE ? THEN 2
            WHEN title LIKE ? THEN 3
            ELSE 4 END",
                [
                    $title,          // trùng khớp hoàn toàn
                    $title . '%',    // bắt đầu bằng từ khóa
                    '%' . $title . '%' // chứa trong giữa chuỗi
                ]
            )
            ->limit(3) // chỉ trả về 5 kết quả liên quan nhất
            ->get();

        return response()->json($news);
    }
}
