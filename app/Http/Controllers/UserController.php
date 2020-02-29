<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignUpRequest;
use App\User;
use Session;

class UserController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->toArray();
        self::$data['title'] .= 'CMS Users';
        self::$data['data'] = $users;
        
        return view('cms.get_users', self::$data);
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
    public function store(SignUpRequest $request)
    {
        if(User::NewUser($request)){
            Session::flash('success_msg', 'New user has been added');
            return redirect('cms/users');
        }else{
            return redirect('cms/users')->withErrors('Something went wrong');
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
        $users = User::all()->toArray();
        
        self::$data['title'] .= 'CMS Users';
        self::$data['id'] = $id;
        self::$data['data'] = $users;
        
        return view('cms.get_users', self::$data);
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
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        if($validateData){
            if(User::UpdateUser($request, $id)){
                Session::flash('success_msg', 'User has been updated successfully');
                return redirect('cms/users');
            }else{
                return redirect('cms/users')->withErrors('Something went wrong');
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
        if(User::DeleteUser($id)){
            Session::flash('success_msg', 'User has been deleted successfully');
            return redirect('cms/users');
        }else{
            return redirect('cms/users')->withErrors('Something went wrong');
        }
    }
}
