<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Admin;
use App\ Service;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users_get()
    {
    	$users = User::all();
    	return view('admin.user.user',compact('users'));
    }

    public function user_delete(Request $request)
    {
        $user = User::where('id',$request->deleteuser)->first();
        $user->delete();
        return back()->with('success','User Deleted');
    }



    public function change_password()
    {
        return view('admin.changePassword');
    }

    public function change_password_save(Request $request)
    {
        $npass = $request->n_pass;
        $cpass = $request->c_pass;
        if ($npass != $cpass)
        {
            return back()->with('alert','Password Not Match');
        }else{
            $admin = Admin::where('id',Auth::user()->id)->first();
            $admin->password = Hash::make($npass);
            $admin->save();
            return back()->with('success','Password Changed');
        }
    }



    public function add_service_page()
    {
        return view('admin.services.add_service');
    }


    public function add_service(Request $request)
        {   
           $service = new Service;

           $service->service_name = $request->service_name;
           $service->description = $request->description;
           $service->save();

           return back()->with('success','Service Added');
        }

         public function all_service()
         {
            $services = Service::all();
            return view ('admin.services.all_services', compact('services'));
         }



}
