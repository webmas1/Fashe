<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewCategoryRequest;
use App\Categorie;
use Session;

class CategorieController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all()->toArray();
        self::$data['title'] .= 'CMS Categories';
        self::$data['data'] = $categories;
        
        return view('cms.get_categories', self::$data);
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
    public function store(NewCategoryRequest $request)
    {
        if(Categorie::NewCategory($request)){
            Session::flash('success_msg', 'New category has been added');
            return redirect('cms/categories');
        }else{
            return redirect('cms/categories')->withErrors('Something went wrong');
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
        
        self::$data['title'] .= 'CMS Categories';
        self::$data['id'] = $id;
        
        return view('cms.get_categories', self::$data);
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
            'name' => 'required|alpha_dash|min:3|max:25|unique:categories,name,'.$id, //UNIQUE APART FROM ITSELF
            'url' => 'required|alpha_dash|min:3|max:25|unique:categories,url_name,'.$id, //UNIQUE APART FROM ITSELF
            'image' => 'file|image'
        ]);

        if($validateData){
            if(Categorie::UpdateCategory($request, $id)){
                Session::flash('success_msg', 'Category has been updated successfully');
                return redirect('cms/categories');
            }else{
                return redirect('cms/categories')->withErrors('Something went wrong');
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
        if(Categorie::DeleteCategory($id)){
            Session::flash('success_msg', "Category and all it's products has been deleted successfully");
            return redirect('cms/categories');
        }else{
            return redirect('cms/categories')->withErrors('Something went wrong');
        }
    }
}
