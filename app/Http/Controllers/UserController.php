<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function user_registration(Request $request){

       
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->password = bcrypt($request->password);
        $user->company = $request->company;
        $user->address = $request->address; 
        $user->country = $request->country; 
        $user->zip = $request->zip; 
        $user->phone = $request->phone; 
        $user->password = bcrypt($request->password);
        $user->save();
        return Redirect('/login');
        
    }


    public function profile()
    {
       $user = User::where('id',Auth::user()->id)->first();
        return view('user.profile',compact('user'));
    }


    public function profile_update(Request $request)
    {
        $data = $request->all();
        $user = User::where('id',Auth::user()->id)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->company = $request->company;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->zip = $request->zip;
        $user->phone = $request->phone;
        $user->save();

        return back()->with('success','Profile Updated');
    }



    public function change_password()
    {
        return view('changePassword');
    }

    public function change_password_save(Request $request)
    {
        $npass = $request->n_pass;
        $cpass = $request->c_pass;
        if ($npass != $cpass)
        {
            return back()->with('alert','Password Not Match');
        }else{
            $user = User::where('id',Auth::user()->id)->first();
            $user->password = Hash::make($npass);
            $user->save();
            return back()->with('success','Password Changed');
        }
    }
}
