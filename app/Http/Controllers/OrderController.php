<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Session;

class OrderController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('user')){
            $user_id = $request->get('user');
            $orders = Order::where('user_id', $user_id)->get()->toArray();
        }else{
            $orders = Order::all()->toArray();
        }
        
        self::$data['title'] .= 'CMS Orders';
        self::$data['data'] = $orders;
        
        return view('cms.get_orders', self::$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // self::$data['title'] .= 'CMS New category';
        // return view('cms.new_category', self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
    
        if(Order::MarkAsSent($request, $id)){
            Session::flash('success_msg', 'Order marked as sent');
            return redirect('cms/orders');
        }else{
            return redirect('cms/orders')->withErrors('Something went wrong');
        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Order::DeleteOrder($id)){
            Session::flash('success_msg', 'Order has been deleted successfully');
            return redirect('cms/orders');
        }else{
            return redirect('cms/orders')->withErrors('Something went wrong');
        }
    }
}
