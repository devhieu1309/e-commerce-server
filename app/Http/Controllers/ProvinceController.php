<?php

namespace App\Http\Controllers;

use App\Services\ProvinceService;
use Exception;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    protected $provinceService;

    public function __construct(ProvinceService $provinceService)
    {
        $this->provinceService = $provinceService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $provinces = $this->provinceService->getAllProvinces();
            return response()->json([
                'message' => 'Lấy danh sách tỉnh thành thành công',
                'provinces' => $provinces
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Lỗi khi lấy danh sách tỉnh thành: ' . $e->getMessage()
            ], 500);
        }
    }

    
}
