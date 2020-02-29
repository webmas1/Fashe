<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewProductRequest;
use App\Product;
use App\Categorie;
use Session;

class ProductController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // CATEGORIES COMES FROM MAIN CONTROLLER

        $products = Product::all()->toArray();
        self::$data['title'] .= 'CMS Products';
        self::$data['data'] = $products;
        
        return view('cms.get_products', self::$data);
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
    public function store(NewProductRequest $request)
    {
        $category_id = $request->cat_id;

        if(Product::NewProduct($request)){
            Session::flash('success_msg', 'New product has been added');
            return redirect('cms/products/'.$category_id);
        }else{
            return redirect('cms/products/'.$category_id)->withErrors('Something went wrong');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($chosen_category = Categorie::where('id', $id)->get()->toArray()){
            self::$data['chosen_category'] = $chosen_category[0];
        };

        // CATEGORIES COMES FROM MAIN CONTROLLER

        $products = Product::where('categorie_id', $chosen_category[0]['id'])->get()->toArray();
        self::$data['title'] .= 'CMS Products';
        self::$data['data'] = $products;
         
        return view('cms.get_products', self::$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        //CATEGORIES COMES FROM MAIN CONTROLLER
        
        $product = Product::find($id)->toArray();
        $category_id = $product['categorie_id'];
        $products = Product::where('categorie_id', $category_id)->get()->toArray();
        $chosen_category = Categorie::where('id', $category_id)->get()->toArray();
        
        self::$data['title'] .= 'CMS Products';
        self::$data['chosen_category'] = $chosen_category[0];
        self::$data['data'] = $products;
        self::$data['id'] = $id;
        
        return view('cms.get_products', self::$data);
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
        $validateData = $request->validate([
            'name' => 'required|min:3|max:25|unique:products,name,'.$id, //UNIQUE APART FROM ITSELF
            'desc' => 'required|min:10|max:500',
            'price' => 'required|numeric|gt:0',
            'image' => 'file|image'
        ]);

        if($validateData){
            if(Product::UpdateProduct($request, $id)){
                Session::flash('success_msg', 'Product has been updated successfully');
                return redirect('cms/products');
            }else{
                return redirect('cms/products')->withErrors('Something went wrong');
            }
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
        $product = Product::find($id)->toArray();
        $category_id = $product['categorie_id'];

        if(Product::DeleteProduct($id)){
            Session::flash('success_msg', 'Product has been deleted successfully');            
            return redirect('cms/products/'.$category_id);
        }else{
            return redirect('cms/products/'.$category_id)->withErrors('Something went wrong');
        }
    }
}
