<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\FuncCall;

class BannerController extends Controller
{
    //

    public function index()
    {
        $banner = Banner::all();
        return  response()->json($banner);
    }

    public function store(StoreBannerRequest $request)
    {


        try {
            // Lấy dữ liệu đã validate
            $data = $request->validated();

            // Tạo tên ngẫu nhiên cho ảnh
            $imageName = Str::random(32) . '.' . $request->file('image')->getClientOriginalExtension();

            // Lưu ảnh vào thư mục storage/app/public/banner
            Storage::disk('public')->put(
                'banner/' . $imageName,
                file_get_contents($request->file('image'))
            );

            // Lưu thông tin banner vào database
            $banner = Banner::create([
                'title'     => $data['title'],
                'image'     => 'banner/' . $imageName,
                'link_url'  => $data['link_url'],
                'position'  => $data['position'],
                'is_active' => (int) $data['is_active'],
            ]);

            return response()->json([
                'message' => 'Thêm Banner thành công!',
                'banner'  => $banner,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Thêm Banner thất bại!',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        $banner = Banner::findOrFail($id);

        return response()->json($banner);
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa Banner thành công',
            'deleted_id' => $id
        ]);
    }


    public function update(UpdateBannerRequest $request, $id)
    {

        try {
            $banner = Banner::findOrFail($id);
            $data = $request->validated();

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Xóa ảnh cũ nếu tồn tại
                if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                    Storage::disk('public')->delete($banner->image);
                }

                // Lưu ảnh mới
                $image = $request->file('image');
                $imageName = Str::random(32) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('banner', $imageName, 'public');
                $data['image'] = 'banner/' . $imageName;
            } else {
                // Không có ảnh mới -> giữ ảnh cũ
                $data['image'] = $banner->image;
            }

            $banner->update($data);

            return response()->json([
                'message' => 'Cập nhật Banner thành công!',
                'banner' => $banner,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Cập nhật Banner thất bại!',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ], 500);
        }
    }

    public function search(Request $request)
    {

        $title = trim($request->query('title'));

        if (!$title) {
            return response()->json(Banner::all());
        }

        $banners = Banner::where('title', 'LIKE', '%' . $title . '%')
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

        return response()->json($banners);
    }
}
