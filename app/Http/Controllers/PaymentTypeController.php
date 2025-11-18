<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentTypeRequest;
use App\Http\Requests\UpdatePaymentTypeRequest;
use Illuminate\Http\Request;
use App\Services\PaymentTypeService;
use Exception;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $paymentTypeService;

    public function __construct(PaymentTypeService $paymentTypeService)
    {
        $this->paymentTypeService = $paymentTypeService;
    }
    public function index(Request $request)
    {
        try {
            $paymentType = $this->paymentTypeService->getAllPaymentType();

            return response()->json([
                'success' => true,
                'paymentType' => $paymentType
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentTypeRequest $data)
    {
        try {
            $imagePath = null;

            if ($data->hasFile('image')) {
                $imagePath = $data->file('image')->store('payment_types', 'public');
            }

            $paymentType = $this->paymentTypeService->savePaymentType($data, $imagePath);

            return response()->json([
                'success' => true,
                'paymentType' => $paymentType
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $paymentType = $this->paymentTypeService->getById($id);
            return response()->json([
                'success' => true,
                'storeBranch' => $paymentType
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentTypeRequest $request, $id)
    {
        //
        try {
            $imagePath = null;

            // Nếu có gửi ảnh mới
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('payment_types', 'public');
            }

            $paymentType = $this->paymentTypeService->updatePaymentType($request, $id, $imagePath);

            return response()->json([
                'success' => true,
                'data' => $paymentType
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $paymentType = $this->paymentTypeService->deleteById($id);

            return response()->json([
                'success' => true,
                'message' => 'Xóa thành công.',
                'data' => $paymentType
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
