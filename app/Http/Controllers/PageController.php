<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewPageRequest;
use App\Page;
use Session;

class PageController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // PAGES COMES FROM MAIN CONTROLLER

        self::$data['title'] .= 'CMS Pages';
        
        return view('cms.get_pages', self::$data);
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
    public function store(NewPageRequest $request)
    {
        if(Page::NewPage($request)){
            Session::flash('success_msg', 'New page has been added');
            return redirect('cms/pages');
        }else{
            return redirect('cms/pages')->withErrors('Something went wrong');
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
        $page = Page::where('id', $id)->get()->toArray();
        self::$data['title'] .= 'CMS Pages';
        self::$data['data'] = $page[0];
        
        return view('cms.edit_page', self::$data);
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
            'name' => 'required|min:3|max:25|unique:pages,name,'.$id, //UNIQUE APART FROM ITSELF
            'url' => 'required|min:3|max:25|unique:pages,url_name,'.$id, //UNIQUE APART FROM ITSELF
            'headline' => 'required|min:3|max:255',
            'content' => 'required', 
            'image' => 'image'
        ]);

        if($validateData){
            if(Page::UpdatePage($request, $id)){
                Session::flash('success_msg', 'Page has been updated successfully');
                return redirect('cms/pages');
            }else{
                return redirect('cms/pages')->withErrors('Something went wrong');
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
        if(Page::DeletePage($id)){
            Session::flash('success_msg', 'Page has been deleted successfully');
            return redirect('cms/pages');
        }else{
            return redirect('cms/pages')->withErrors('Something went wrong');
        }
    }
}
