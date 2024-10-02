<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'All Orders',
            'data' => Orders::all()
        ], 200);
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
        try {
            $validator = Validator::make($request->all(),
                [
                    'customerID' => 'required|integer',
                    'supplierID' => 'required|integer',
                    'skillID' => 'required|integer',
                    'no_of_hours' => 'required|integer',
                    'total_amount' => 'required|numeric',
                    'description' => 'nullable|string',
                    'status' => 'nullable|string',
                ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $order = new Orders([
                'customerID' => $request->customerID,
                'supplierID' => $request->supplierID,
                'skillID' => $request->skillID,
                'no_of_hours' => $request->no_of_hours,
                'total_amount' => $request->total_amount,
                'description' => $request->description,
                'status' => $request->status
            ]);

            if ($order->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Order added successfully',
                    'data' => $order
                ], 201);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Order not added'
                ], 500);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $order = Orders::find($id);

            if ($order) {
                return response()->json([
                    'status' => true,
                    'message' => 'Order found',
                    'data' => $order
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Order not found'
                ], 404);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validator = Validator::make($request->all(),
                [
                    'status' => 'required|string',
                ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $order = Orders::find($id);

            if ($order) {
                $order->status = $request->status;

                if ($order->save()) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Order completed successfully',
                        'data' => $order
                    ], 200);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'Order not completed'
                    ], 500);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Oder not found'
                ], 404);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $order = Orders::find($id);

            if ($order) {
                $order->delete();

                return response()->json([
                    'status' => true,
                    'message' => 'Order deleted successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Order not found'
                ], 404);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }
}
