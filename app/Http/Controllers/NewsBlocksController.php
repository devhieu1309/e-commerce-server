<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsBlocksRequests;
use App\Http\Requests\UpdateNewsBlocksRequests;
use App\Models\NewsBlocks;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class NewsBlocksController extends Controller
{
    //
    public function index()
    {
        $newsBlocks = NewsBlocks::all();
        return  response()->json($newsBlocks);
    }

    public function store(StoreNewsBlocksRequests $request)
    {

        try {
            // Lấy dữ liệu đã validate
            $data = $request->validated();

            // Tạo tên ngẫu nhiên cho ảnh
            $imageName = Str::random(32) . '.' . $request->file('image')->getClientOriginalExtension();

            // Lưu ảnh vào thư mục storage/app/public/newsBlocks
            Storage::disk('public')->put(
                'newsBlocks/' . $imageName,
                file_get_contents($request->file('image'))
            );

            // Lưu thông tin banner vào database
            $newsBlocks = NewsBlocks::create([
                'title'     => $data['title'],
                'content'     => $data['content'],
                'image'     => 'newsBlocks/' . $imageName,
                'position' => (int) $data['position'],
                'news_id'     => $data['news_id'],
            ]);

            return response()->json([
                'message' => 'Thêm bài viết thành công!',
                'newsBlocks'  => $newsBlocks,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Thêm bài viết thất bại!',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        $newsBlocks = NewsBlocks::findOrFail($id);

        return response()->json($newsBlocks);
    }

    public function destroy($id)
    {
        $newsBlocks = NewsBlocks::findOrFail($id);
        $newsBlocks->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa bài viết thành công',
            'deleted_id' => $id
        ]);
    }


    public function update(UpdateNewsBlocksRequests $request, $id)
    {

        try {
            $newsBlocks = NewsBlocks::findOrFail($id);
            $data = $request->validated();

            if ($request->hasFile('image')) {
                // Xóa ảnh cũ nếu tồn tại
                if ($newsBlocks->image && Storage::disk('public')->exists($newsBlocks->image)) {
                    Storage::disk('public')->delete($newsBlocks->image);
                }

                // Lưu ảnh mới
                $image = $request->file('image');
                $imageName = Str::random(32) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('newsBlocks', $imageName, 'public');
                $data['image'] = 'newsBlocks/' . $imageName;
            }

            $newsBlocks->update($data);

            return response()->json([
                'message' => 'Cập nhật bài viết thành công!',
                'newsBlocks' => $newsBlocks,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Cập nhật bài viết thất bại!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function search(Request $request)
    {

        $title = trim($request->query('title'));

        if (!$title) {
            return response()->json(NewsBlocks::all());
        }

        $newsBlocks = NewsBlocks::where('title', 'LIKE', '%' . $title . '%')
            // chỉ lấy những banner chứa cụm từ gần giống nhất
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
            ->limit(5) // chỉ trả về 5 kết quả liên quan nhất
            ->get();

        return response()->json($newsBlocks);
    }
}
