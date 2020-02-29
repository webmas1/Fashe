<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Categorie;
use App\Page;
use App\Product;
use App\User;
use App\Order;
use Cart;
use Session;


class PagesController extends MainController
{
    // HOME ------------------------------//
    public static function GetHome(){
        $crsl_products = Product::orderByRaw('RAND()')->take(3)->get();
        $new_products = Product::latest()->take(8)->get();

        self::$data['crsl'] = $crsl_products;
        self::$data['new'] = $new_products;
        
        return view('content.home', self::$data);
    }
    //------------------------------------//

    // SUBSCRIBE ------------------------------//
    public static function Subscribe(){
        User::Subscribe(); 
    }
    //------------------------------------//

    // UNSUBSCRIBE ------------------------------//
    public static function Unsubscribe(){
        User::Unsubscribe();
    }
    //------------------------------------//
    
    // PAGES ------------------------------//
    public static function GetPage($page_url){
        $page = Page::where('url_name', $page_url)->get()->toArray();
        self::$data['page'] = $page[0];
        self::$data['title'] .= $page[0]['name'];
        
        return view('content.page', self::$data);
    }
    //------------------------------------//
    
    // CATEGORIES ------------------------//
    public static function GetCategories(){
        
        self::$data['title'] .= 'Categories';
        
        return view('content.categories', self::$data);
        
    }
    //------------------------------------//
    
    // PRODUCTS --------------------------//
    public static function GetAllProducts(Request $request, $cat_url){

        if($category = Categorie::where('url_name', $cat_url)->get()->toArray()){
            $orderby = $request->get('orderby'); //USER PICKED TO ORDER BY
            switch ($orderby) {
                case 'price_high': //BY PRICE FROM HIGH TO LOW
                    $products = Categorie::find($category[0]['id'])->Products()->orderBy('price', 'desc');
                    break;
                case 'price_low': //BY PRICE FROM LOW TO HIGH
                $products = Categorie::find($category[0]['id'])->Products()->orderBy('price', 'asc');
                    break;
                case 'newest': //BY THE NEWEST
                    $products = Categorie::find($category[0]['id'])->Products()->orderBy('created_at', 'asc');
                    break;
                default: //DEFAULT UNORDERED
                    $products = Categorie::find($category[0]['id'])->Products();
            }
            
            self::$data['cat_url'] = $cat_url;
            self::$data['orderby'] = $orderby;
            self::$data['cat_name'] = $category[0]['name'];;
            self::$data['title'] .= $category[0]['name'];
            self::$data['products'] = $products->paginate(8); //8 PRODUCTS EACH PAGE
             
            return view('content.products', self::$data); 

        } 
    }    
    
    public static function GetProduct($cat_url, $product_url){
        if($product = Product::where('url_name', $product_url)->get()->toArray()){
            $category = Categorie::where('url_name', $cat_url)->get()->toArray();
            
            self::$data['product'] = $product[0];
            self::$data['category'] = $category[0]['name'];
            self::$data['cat_url'] = $cat_url;
            self::$data['title'] .= $product[0]['name'];
            
            return view('content.product', self::$data);
        }
    }
    //------------------------------------//

    // CART ------------------------------//
    public static function AddToCart(Request $request){
        if($request->pid && is_numeric($request->pid)){
            Product::AddToCart($request->pid);
        }
    }
    
    public function GetCheckout(){
        self::$data['title'] .= 'Cart';
        return view('content.checkout', self::$data);
    }
    
    public function UpdateCart(Request $request){
        Product::UpdateCart($request->pid, $request->op);
    }
    
    public function DeleteCart(){
        Product::EmptyCart();
        return redirect('/checkout');
    }

    public function SaveOrder(){
        if(Session::has('user_id')){ //CHECKING IF USER LOGED IN
            if(!Cart::isEmpty()){ //CHECKING IF CART IS NOT EMPTY
                if(Order::SaveOrder()){
                    Session::flash('success_msg', 'Your order has been saved');
                    return redirect('/');
                };
            }else{
                Session::flash('warning_msg', 'Your cart is empty');
                return redirect('/categories');
            }
        }else{
            Session::flash('warning_msg', 'Please sign in to continue');
            return redirect('user/signin');
        }
    }
    //------------------------------------//
 
    // USER ------------------------------//

    public function SignIn(){ //SENDING USER TO SIGN IN PAGE
        self::$data['title'] .= 'Sign In';
        return view('forms.signin', self::$data);
    }

    public function SignInRequest(SignInRequest $request){
        if(User::SignIn($request->email, $request->password)){
            return redirect('/');
        }else{
            return redirect('user/signin')->withErrors('Email and password are not correct');
        }
    }

    public function LogOut(){
        Session::flush(); //DELETES ALL SESSIONS
        return redirect('user/signin');
    }

    public function SignUp(){ //SENDING USER TO SIGN UP PAGE
        self::$data['title'] .= 'Sign Up';
        return view('forms.signup', self::$data);
    }
    
    public function SignUpRequest(SignUpRequest $request){
        if(User::SignUp($request)){
            Session::flash('success_msg', 'You have successfully registered');
            return redirect('user/signin');
        }
    }
}

