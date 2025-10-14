<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

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
        $validated = $request->safe()->only('title', 'image', 'link_url', 'position', 'is_active');
        $banner = Banner::create($validated);

        return response()->json($banner, 201);
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
        $banner = Banner::findOrFail($id);

        $banner->update([
            'title' => $request->get('title'),
            'image' => $request->get('image'),
            'link_url' => $request->get('link_url'),
            'position' => $request->get('position'),
            'is_active' => $request->get('is_active'),

        ]);

        return response()->json($banner);
    }
}
