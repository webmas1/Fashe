<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use DateTime;

class Page extends Model
{
    public static function GetAllPages(){
        $pages = self::all()->toArray();
        return $pages;
    }


    
    // CMS FUNCTIONS //

    public static function NewPage($request){
        $page = new self();

        $url = str_replace(' ', '_' ,$request->url); //REPLACING SPACE WITH UNDERSCORE TO CATEGORY NAME FOR URL

        if($request->hasFile('image') && $request->file('image')->isValid()){ //IF UPLOADING CATEGORY IMAGE
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'page-'.$url.'.'.$extension;
            $path = public_path().'/images/pages';

            $file->move($path, $file_name);
            
        }else {
            $file_name = '';
        }

        $page->name = $request->name;
        $page->url_name = $url;
        $page->headline = $request->headline;
        $page->content = $request->content;
        $page->image = $file_name;

        $page->save();

        if($page->id){
            return true;
        }else{
            return false;
        }

    }

    public static function UpdatePage($request, $id){
        $url = str_replace(' ', '_' ,$request->url); //REPLACING SPACE WITH UNDERSCORE TO CATEGORY NAME FOR URL
        
        $page = self::find($id);

        if($request->hasFile('image') && $request->file('image')->isValid()){ //IF UPLOADING CATEGORY IMAGE
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'cat-'.$url.'.'.$extension;
            $path = public_path().'/images/pages';

            $file->move($path, $file_name);

            $page->image = $file_name;
        }

        
        
        $page->name = $request->name;
        $page->url_name = $url;
        $page->headline = $request->headline;
        $page->content = $request->content;
        

        $page->updated_at = new DateTime();
        $page->save();

        if($page->id){
            return true;
        }else{
            return false;
        }
    }

    public static function DeletePage($id){
        $page = self::find($id);
        if($page->delete()){
            return true;
        }else{
            return false;
        }
    }
    
}
