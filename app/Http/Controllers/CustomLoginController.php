<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Photographer;
use App\User;
class CustomLoginController extends Controller
{
    public function custom_login(Request $request){
    	$this->validate($request,[
    		'email' => 'required',
    		'password' => 'required|min:8'
    	]);

    	if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
    	{
            return redirect(route('user.dashboard'));

        }

        else if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) 
        {
        	return redirect(route('admin.dashbord'));
        	
        }
        elseif (Auth::guard('photographer')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) 
        {
        	return redirect(route('photo.dashbord'));
        }else{
        	return back()->with('alert','adasdsa');
        }



    }


    public function custom_reg(Request $request){
        $type = $request->type;

        if ($type == 1) {

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
        return Redirect('/login')->with('success','User registration Successfully');
           
        } else {
            // return $input = $request->all();
            // $data = DB::table('photographer');
            $photo = new Photographer;
            $photo->first_name = $request->first_name;
            $photo->last_name=$request->last_name;
            $photo->email=$request->email;
            $photo->password = bcrypt($request->password);
            $photo->company = $request->company;
            $photo->address = $request->address; 
            $photo->country = $request->country; 
        
            $photo->zip = $request->zip; 
            $photo->phone = $request->phone; 
            $photo->password = bcrypt($request->password);
            $photo->save();
            return Redirect('/login')->with('success','User registration Successfully');

        }
    }

}
