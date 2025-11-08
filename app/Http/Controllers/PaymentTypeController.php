<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use App\Http\Controllers\Controller;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentType $paymentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentType $paymentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentType $paymentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentType $paymentType)
    {
        //
    }
}
