<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Service;
use App\Order;
use App\Photographer;

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
        $user->role= 0;
        $user->zip = $request->zip; 
        $user->phone = $request->phone; 
        $user->password = bcrypt($request->password);
        $user->save();
        return Redirect('/login')->with('success','User registration Successfully');;
        
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
         $this->validate($request,[
        'npass' => 'required',
        'cpass' => 'required',
        
      ]);

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


    public function show_services()
    {   
        $services = Service::all();
        return view('user.show_services',compact('services'));
    }


    public function user_dashboard()
    {
        return view('user.index');
    }
     public function photo_dashboard()
    {
        return view('photographer.index');
    }



    public function p_profile()
    {
       $photographer = Photographer::where('id',Auth::user()->id)->first();
        return view('photographer.p_profile',compact('photographer'));
    }



    public function update_p_profile(Request $request)
    {
        $data = $request->all();
        $user = Photographer::where('id',Auth::user()->id)->first();
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




}
