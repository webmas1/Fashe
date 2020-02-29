<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Page;

class MainController extends Controller
{
    public static $data; //VAR DECLARATION
    
    public function __construct() {

        //FOR ALL VIEWS

        $categories = Categorie::GetAllCategories();
        $pages = Page::GetAllPages();
        
        if($categories){
            self::$data['categories'] = $categories;
        }
        if($pages){
            self::$data['pages'] = $pages;
        }
        self::$data['title'] = 'Fashe. ';
    }
}
