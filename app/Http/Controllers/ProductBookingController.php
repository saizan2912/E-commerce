<?php

namespace App\Http\Controllers;


use App\Models\ProductBooking;
use App\Models\Cart;  
use Illuminate\Http\Request;
use Session;
use Omnipay\Omnipay;

class ProductBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $cart_id = $request->cart_id;
        $data = array();
        $amount = 0;
        foreach ($cart_id as $i=>$value){
            $cart = Cart::find($value);
            $amount += $cart->product->price; // Add the product price to $amount

            $data[$i]['user_id'] = $cart->user_id;
            $data[$i]['product_id'] = $cart->product_id;
            $data[$i]['qty'] = $cart->qty;
            $data[$i]['payment_status'] = '0';

        }
        $productBooking = ProductBooking::insert($data);
if ($productBooking){
    Cart::destroy($cart_id);
}
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductBooking $productBooking)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductBooking $productBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductBooking $productBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductBooking $productBooking)
    {
        //
    }
}
