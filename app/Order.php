<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use Cart;
use DateTime;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public static function SaveOrder(){
        $user_id = Session::get('user_id');
        $seri = serialize(Cart::getContent()->toArray()); //SERIALIZE CART CONTENT BEFORE PUTTING IT TO DATABASE
        $total = Cart::getTotal();

        $order = New self();
        $order->user_id = $user_id;
        $order->data = $seri;
        $order->total = $total;
        $order->save();
        if($order->id){
            Cart::clear(); //RESET CART
            return true;
        }
    }

    

// CMS FUNCTIONS

    // Dashboard

    public static function getLastOrders(){

        $orders = self::all()->count();

        return $orders;
    }
    
    public static function getLastPayed(){

        $payed = self::where('created_at', ">", DB::raw('NOW() - INTERVAL 1 WEEK'))->where('payment', 1)->count();

        return $payed;
    }

    public static function getLastSent(){

        $sent = self::where('created_at', ">", DB::raw('NOW() - INTERVAL 1 WEEK'))->where('sent', 1)->count();

        return $sent;
    }

    public static function getLastRevenue(){ 

        $total = 0;

        if($orders = self::where('created_at', ">", DB::raw('NOW() - INTERVAL 1 WEEK'))->where('payment', 1)->get()){
            foreach ($orders as $order) {
                $total = $total + $order['total'];
            }
        }

        return $total;
    }


    public static function MarkAsSent($request, $id){
        $order = self::find($id);
        
        $order->sent = '1'; //1 IS = SENT
        $order->updated_at = new DateTime();
        $order->save();

        if($order->id){
            return true;
        }else{
            return false;
        }
    }

    public static function DeleteOrder($id){
        $order = self::find($id);
        if($order->delete()){
            return true;
        }else{
            return false;
        }
    }

}
