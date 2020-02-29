<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;

class CmsController extends MainController
{
    public function GetDashboard(){

        $orders = Order::getLastOrders();
        $payed = Order::getLastPayed();
        $sent = Order::getLastSent();
        $revenue = Order::getLastRevenue();
        $users = User::getLastUsers();

        self::$data['title'] .= 'CMS';
        self::$data['orders'] = $orders;
        self::$data['payed'] = $payed;
        self::$data['sent'] = $sent;
        self::$data['revenue'] = $revenue;
        self::$data['users'] = $users;

        return view('cms.dashboard', self::$data);
    }
}
