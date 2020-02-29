<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;
use Session;

use DateTime;

class Product extends Model {

    public static function GetProducts() {
        $products = self::all()->toArray();
        dd($products);
    }

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }



    // CART FUNCTIONS

    public static function AddToCart($pid) {
        $product = self::find($pid);
        $product = $product->toArray();
        if ($product['id']) {
            Cart::add($product['id'], $product['name'], $product['price'], 1, array('image' => $product['image']));
            $product_name = $product['name'];
        }
        Session::flash('product_name_msg', $product_name); //TRANSFERRING PRODUCT NAME TO CONFIRM MESSAGE
        Session::flash('msg', 'has been added to cart'); //TRANSFERRING MESSAGE TO CONFIRM MESSAGE
    }

    public static function UpdateCart($pid, $op) {
        $product = self::find($pid);
        $product = $product->toArray();
        if ($product['id']) {
            $product_name = $product['name'];
        }

        if(is_numeric($pid) && Cart::get($pid)){
            Session::flash('product_name_msg', $product_name); //TRANSFERRING PRODUCT NAME TO CONFIRM MESSAGE

            if(trim($op) === 'plus'){
                Cart::update($pid, array('quantity' => 1, ));
            } elseif(trim($op) === 'minus' && Cart::get($pid)->quantity > 1){
                Cart::update($pid, array('quantity' => -1, ));
            } elseif(trim($op) === 'del'){
                Cart::remove($pid);
                Session::flash('msg', 'has been removed from cart'); //TRANSFERRING MESSAGE TO CONFIRM MESSAGE
            }
        }
        
    }

    public static function EmptyCart(){
        Session::flash('empty_cart_msg'); //TRANSFERRING MESSAGE TO CONFIRM MESSAGE
        Cart::clear();
    }



    // CMS FUNCTIONS //

    public static function NewProduct($request){
        $url = str_replace(' ', '_' ,$request->name); //REPLACING SPACE WITH UNDERSCORE TO CATEGORY NAME FOR URL

        if($request->hasFile('image') && $request->file('image')->isValid()){ //IF UPLOADING CATEGORY IMAGE
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'cat-'.$url.'.'.$extension;
            $path = public_path().'/images/categories';

            $file->move($path, $file_name);
        }else{
            $file_name = 'cat-default.jpg'; //DEFAULT IMAGE FOR NONE UPLOADING
        }

        $product = new self();

        $product->categorie_id = $request->cat_id;
        $product->name = $request->name;
        $product->url_name = $url;
        $product->description = $request->desc;
        $product->price = $request->price;
        $product->image = $file_name;

        $product->save();

        if($product->id){
            return true;
        }else{
            return false;
        }

    }

    public static function UpdateProduct($request, $id){
        $url = str_replace(' ', '_' ,$request->name); //REPLACING SPACE WITH UNDERSCORE TO CATEGORY NAME FOR URL

        $product = self::find($id);

        if($request->hasFile('image') && $request->file('image')->isValid()){ //IF UPLOADING CATEGORY IMAGE
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'cat-'.$url.'.'.$extension;
            $path = public_path().'/images/categories';

            $file->move($path, $file_name);

            $product->image = $file_name;
        }
        
        $product->name = $request->name;
        $product->url_name = $url;
        $product->description = $request->desc;
        $product->price = $request->price;

        $product->updated_at = new DateTime();
        
        $product->save();

        if($product->id){
            return true;
        }else{
            return false;
        }
    }

    public static function DeleteProduct($id){
        $product = self::find($id);
        if($product->delete()){
            return true;
        }else{
            return false;
        }
    }

}
