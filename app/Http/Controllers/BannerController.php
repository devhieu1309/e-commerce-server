<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    //

    public function index()
    {
        $banner = Banner::all();
        return  response()->json($banner);
    }

    // public function store(StoreBannerRequest $request)
    // {
    //     $validated = $request->safe()->only('title', 'image', 'link_url', 'position', 'is_active');
    //     $banner = Banner::create($validated);

    //     return response()->json($banner, 201);
    // }

    public function store(StoreBannerRequest $request)
    {
        // try {
        //     // Lấy dữ liệu đã validate
        //     $validated = $request->validated();

        //     // Xử lý upload ảnh
        //     if ($request->hasFile('image')) {
        //         // Lưu vào storage/app/public
        //         $path = $request->file('image')->store('public');
        //         $validated['image'] = $path; // Lưu đường dẫn vào DB
        //     }

        //     // Tạo bản ghi mới trong DB
        //     $banner = Banner::create($validated);

        //     return response()->json([
        //         'message' => 'Banner được thêm thành công',
        //         'data' => $banner
        //     ], 201);
        // } catch (\Exception $e) {
        //     // Bắt lỗi nếu có (tránh lỗi 500 mơ hồ)
        //     return response()->json([
        //         'message' => 'Thêm Banner thất bại',
        //         'error' => $e->getMessage(),
        //     ], 500);
        // }

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


    public function update(StoreBannerRequest $request, $id)
    {

        try {
            $banner = Banner::findOrFail($id);
            $data = $request->validated();

            if ($request->hasFile('image')) {
                // Xóa ảnh cũ nếu tồn tại
                if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                    Storage::disk('public')->delete($banner->image);
                }

                // Lưu ảnh mới
                $image = $request->file('image');
                $imageName = Str::random(32) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('banner', $imageName, 'public');
                $data['image'] = 'banner/' . $imageName;
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
            ], 500);
        }
    }
}
