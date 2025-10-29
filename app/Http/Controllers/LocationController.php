<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Lấy danh sách tỉnh/thành
    public function getProvinces()
    {
        return response()->json(Province::all());
    }

    // Lấy danh sách quận/huyện theo tỉnh
    public function getDistricts($province_id)
    {
        return response()->json(District::where('province_id', $province_id)->get());
    }

    // Lấy danh sách phường/xã theo quận
    public function getWards($district_id)
    {
        return response()->json(Ward::where('district_id', $district_id)->get());
    }
}
