<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Session;
use DateTime;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    public static function SignIn($email, $password){
        $valid = false;

        if($user = self::where('email', '=', $email)->get()->toArray()){
            $user = $user[0];
        
            if(Hash::check($password, $user['password'])){
                if($user['role'] == 6){
                    Session::put('user_name', $user['first_name'].' '.$user['last_name']);
                    Session::put('is_admin', 'true');
                }

                if($user['subscribe'] == 2){
                    Session::put('subscribe', 'false');
                }

                Session::put('user_id', $user['id']);
                Session::put('email', $user['email']);

                $valid = true;

            } else {
                $valid = false;
            }
        }
        return $valid;
    }

    public static function SignUp($request){
        $user = new self();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 1;
        $user->subscribe = 2;

        $user->save();

        return true;
    }


    public static function Subscribe(){
        if($id = Session::has('user_id')){
            $user = self::find($id);
            $user->subscribe = 1;

            $user->save();

            Session::forget('subscribe');
            Session::flash('success_msg', 'You subscribed your email successfully');

            if($user->id){
                return true;
            }else{
                return false;
            } 
        }
    }

    public static function Unsubscribe(){
        if($id = Session::has('user_id')){
            $user = self::find($id);
            $user->subscribe = 2;

            $user->save();

            Session::put('subscribe', 'false');
            Session::flash('success_msg', 'You unsubscribed from newsletter successfully');

            if($user->id){
                return true;
            }else{
                return false;
            }
        }
    }


    // CMS FUNCTIONS


    public static function getLastUsers(){ // Dashboard

        $users_count = self::where('created_at', ">", DB::raw('NOW() - INTERVAL 1 WEEK'))->count();

        return $users_count;

        
    }


    public static function NewUser($request){
        $user = new self();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;

        $user->save();

        return true;
    }

    public static function UpdateUser($request, $id){

        $user = self::find($id);
        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->role = $request->role;
        
        $user->updated_at = new DateTime();
        $user->save();

        if($user->id){
            return true;
        }else{
            return false;
        }
    }

    public static function DeleteUser($id){
        $user = self::find($id);
        if($user->delete()){
            return true;
        }else{
            return false;
        }
    }
}
