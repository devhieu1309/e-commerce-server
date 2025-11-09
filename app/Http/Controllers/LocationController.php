<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function countries()
    {
        return response()->json(Country::select('countries_id', 'name')->get());
    }

    public function provinces()
    {
        // Lấy danh sách tỉnh/thành (FE dùng provinces_id)
        return response()->json(
            Province::select('provinces_id', 'name', 'code')->get()
        );
    }

    public function districts($provinceId)
    {
        // ✅ FE gửi provinces_id → tìm theo provinces_id
        $districts = District::where('provinces_id', $provinceId)
            ->select('districts_id', 'name', 'code')
            ->get();

        return response()->json($districts);
    }

    public function wards($districtId)
    {
        // ✅ FE gửi districts_id → tìm theo districts_id
        $wards = Ward::where('districts_id', $districtId)
            ->select('wards_id', 'name', 'code')
            ->get();

        return response()->json($wards);
    }
}
