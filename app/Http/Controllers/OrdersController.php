<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $orders = Orders::with('user', 'skill')->paginate(10);

            //get the $orders->supplierID and get the supplier name from the supplier table
            foreach ($orders as $order) {
                $order->supplier = User::find($order->supplierID)->name;
            }


            return view('orders.index', compact('orders'));
        }catch (Exception $e) {
            Log::error('Error fetching orders: ' . $e->getMessage());
            return redirect()->route('orders.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Error fetching orders.');
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
    public function store(StoreOrdersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdersRequest $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
