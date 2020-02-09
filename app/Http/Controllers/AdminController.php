<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use App\User;
use App\Admin;
use App\ Service;
use App\Order;
use App\Transaction;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users_get()
    {
    	 $users = User::all();
         return view('admin.user.user', compact('users'));
    }

    // public function user_delete(Request $request)
    // {
    //     $user = User::where('id',$request->deleteuser)->first();
    //     $user->delete();
    //     return back()->with('success','User Deleted');
    // }

    

    public function user_delete($id)
    {
        User::findOrFail($id)->delete();
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
           $service->price = $request->price;
           $service->description = $request->description;
           $service->save();

           return back()->with('success','Service Added');
        }


     public function edit_service($id)
     {
        $service = Service::find($id);
        return view('admin.services.edit_service',compact('service')); 
     }

    public function update_service(Request $request)
    
    {
        $service = Service::where('id',$request->service_id)->first();
        $service->service_name = $request->service_name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->save();

        return back()->with('success','service Updated');
    }    

     public function all_service()
     {
        $services = Service::all();
        return view ('admin.services.all_services', compact('services'));
     }

     // public function edit_service($id){
     //   $service = Service::find($id);
     //   return redirect()->back()->with(compact('service'));
     // }

     public function service_delete($id)
    {
        Service::findOrFail($id)->delete();
        return back()->with('success','Service Deleted');
    }




    public function edit_user($id)
    {
        // $user_id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.user.edit_user_profile',compact('user')); 
    }

    public function update_user(Request $request)
    {   
        $id = $request->id;
        $input=$request->all();
        $data=User::findOrFail($id);
        $data->update($input);
        return back()->with('success','Profile Updated');
        // $user_id = Auth::user()->id;
        // $user = User::find($user_id);
        // $user->first_name    = $request->first_name;
        // $user->last_name     = $request->last_name;
        // $user->email         = $request->email;
        // $user->company       = $request->company;
        // $user->address       = $request->address;
        // $user->country       = $request->country;
        // $user->zip           = $request->zip;
        // $user->phone         = $request->phone;

        // $user->save();

        // return back()->with('success','Profile Updated');
    }



  public function all_order()
  {
   
   $orders = Order::join('services','orders.service_id','=','services.id')
            ->join('users','orders.user_id','=','users.id')
            ->select('orders.*', 'services.service_name','users.first_name','users.last_name')
            ->orderBy('orders.id','DESC')->get();
            
            return view('admin.order', compact('orders'));
  }


  public function all_tran()
  {
    $trans = Transaction::all();
    return view('admin.tran', compact('trans'));
  }




}
