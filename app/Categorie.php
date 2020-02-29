<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Session;
use DateTime;

class Categorie extends Model
{
    // FRONT FUNCTIONS

    public static function GetAllCategories(){
        $categories = self::all()->toArray();
        return $categories;
    }
    
    public function products(){
        return $this->hasMany('App\Product');
    }


    
    // CMS FUNCTIONS //

    public static function NewCategory($request){
        $url = str_replace(' ', '_' ,$request->url); //REPLACING SPACE WITH UNDERSCORE TO CATEGORY NAME FOR URL

        if($request->hasFile('image') && $request->file('image')->isValid()){ //IF UPLOADING CATEGORY IMAGE
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'cat-'.$url.'.'.$extension;
            $path = public_path().'/images/categories';

            $file->move($path, $file_name);
        }else{
            $file_name = 'cat-default.jpg'; //DEFAULT IMAGE FOR NONE UPLOADING
        }

        $category = new self();

        $category->name = $request->name;
        $category->url_name = $url;
        $category->image = $file_name;

        $category->save();

        if($category->id){
            return true;
        }else{
            return false;
        }

    }

    public static function UpdateCategory($request, $id){
        $url = str_replace(' ', '_' ,$request->url); //REPLACING SPACE WITH UNDERSCORE TO CATEGORY NAME FOR URL

        $category = self::find($id);

        if($request->hasFile('image') && $request->file('image')->isValid()){ //IF UPLOADING CATEGORY IMAGE
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'cat-'.$url.'.'.$extension;
            $path = public_path().'/images/categories';

            $file->move($path, $file_name);

            $category->image = $file_name;
        }

        $category->name = $request->name;
        $category->url_name = $url;
        $category->updated_at = new DateTime();
        $category->save();

        if($category->id){
            return true;
        }else{
            return false;
        }
    }

    public static function DeleteCategory($id){
        $category = self::find($id);
        if($category->delete()){
            Product::where('categorie_id', $id)->delete(); //DELETES PRODUCTS OF CATEGORY
            return true;
        }else{
            return false;
        }
    }
}
