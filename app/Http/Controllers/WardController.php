<?php

namespace App\Http\Controllers;

use App\Services\WardService;
use Exception;
use Illuminate\Http\Request;

class WardController extends Controller
{
    protected $wardService;
    public function __construct(WardService $wardService)
    {
        $this->wardService = $wardService;
    }
    /**
     * Display a listing of the resource.
     */
    public function  getByProvince($provinceId)
    {
        try {
            $wards = $this->wardService->getWardsByProvince($provinceId);
            return response()->json([
                'message' => 'Lấy danh sách tỉnh thành thành công',
                'wards' => $wards
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Lỗi khi lấy danh sách tỉnh thành: ' . $e->getMessage()
            ], 500);
        }
    }
}
