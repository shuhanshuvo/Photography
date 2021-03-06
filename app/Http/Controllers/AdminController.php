<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\service\ServiceAdd;


use App\User;
use App\Admin;
use App\ Service;
use App\Order;
use App\Transaction;
use DB;
use App\Photographer;



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


    public function photographers_get()
    {
       $photographers = Photographer::all();
         return view('admin.photographer.photographer', compact('photographers'));
    }

     public function photo_delete($id)
    {
        Photographer::findOrFail($id)->delete();
        return back()->with('success','User Deleted');
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
      $this->validate($request,[
        
        
      ]);

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


     public function edit_photo($id)
    {
        // $user_id = Auth::user()->id;
        $photographer = Photographer::find($id);
        return view('admin.photographer.edit_photo',compact('photographer')); 
    }




    public function update_photo(Request $request)
    {   
        $id = $request->id;
        $input=$request->all();
        $data=Photographer::findOrFail($id);
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
   Order::where('order_status',0)->update(['order_status'=>4]);
   $orders = Order::join('services','orders.service_id','=','services.id')
            ->join('users','orders.user_id','=','users.id')
            ->select('orders.*', 'services.service_name','users.first_name','users.last_name')
            ->orderBy('orders.id','DESC')->get();
            
            return view('admin.order', compact('orders'));
  }


  public function complete_order()
  {

   $orders = Order::join('services','orders.service_id','=','services.id')
            ->join('users','orders.user_id','=','users.id')
            ->select('orders.*', 'services.service_name','users.first_name','users.last_name')
            ->orderBy('orders.id','DESC')->get();
            
            return view('admin.complete_order', compact('orders'));
  }

  public function reject_order()
  {
   
   $orders = Order::join('services','orders.service_id','=','services.id')
            ->join('users','orders.user_id','=','users.id')
            ->select('orders.*', 'services.service_name','users.first_name','users.last_name')
            ->orderBy('orders.id','DESC')->get();
            
            return view('admin.reject_order', compact('orders'));
  }


  public function all_tran()
  {
    $trans = Transaction::all();
    return view('admin.tran', compact('trans'));
  }





  // notification

  public function notif()
  { 
    $user = Auth::user();
    $user->notify(new ServiceAdd(User::findOrFail(2)));
  }


  public function approve($id)
  {
    DB::table('orders')
       ->where('id',$id)
       ->update(['order_status' =>1]);

         return back()->with('success','Approved');
        //return a view or whatever you want tto do after
    
   }
   public function reject($id)
  {
    DB::table('orders')
       ->where('id',$id)
       ->update(['order_status' =>2]);

         return back()->with('success','Reject');
        //return a view or whatever you want tto do after
    
   }





}

