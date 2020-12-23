<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Customer;
use Cart;
use Mail;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Customer::create([
            'user_id' => \Auth::user()->id,
            'address' => 'DEFAULT',
            'shipping_addr' => request('shipping_addr'),
            'billing_addr' => request('billing_addr'),
        ]);

        OrderDetail::create([
            'product' => request('product'),
            'qty' => request('qty'),
            'price' => request('price'),
            'discount' => 'NO DISCOUNT',
            'grand_total' => Cart::total(),
        ]);

        Order::create([
            'customer_id' => \Auth::user()->id,
        ]);

        $data = array('name'=>"K. Usman", "body" => "Test");

        Mail::send('emails.mail', $data, function($message){
            $message->to('kusman758@gmail.com', 'Receipt')
                    ->subject('Receipt of Order');
            $message->from('melonmelonz75@gmail.com', 'K');
        });
        

        return view('/confirm');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    public function checkout($id)
    {
        return dd($id);
    }
}
