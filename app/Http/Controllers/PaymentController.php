<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Auth;
use DB;

class PaymentController extends Controller
{
        public function payment_checkout($id)
    {   

        $service = Service::find($id);
        return view('checkout',compact('service'));
    }

    public function checkout (Request $request)
    {   
        // $validatedData = $request->validate([
        // 'sender_number' => 'required',
        // 'trx_id' => 'required',
        // 'bank_number' => 'required',
        //  ]);


      	$data = $request->all();
    	 $user_id = Auth::User()->id;
        // insert order
        $odata=array();
        $odata['service_id'] = $request->service_id;
        $odata['payment_method'] = $request->paymentMethod;
        $odata['amount'] = $request->amount;
        $odata['user_id'] = $user_id;
        $odata['order_status'] = 'Pending';
      	$order_id = DB::table('orders')
                    ->insertGetId($odata);
                    
         
        // insert Transaction
         $sender_number = $request->sender_number;         
         $trx_id = $request->trx_id;         
         $bank_number = $request->bank_number;         
         $paymentMethod = $request->paymentMethod;        
         $amount = $request->amount;         
         $tdata=array();
            $tdata['sender_number'] = $sender_number;
            $tdata['trx_id'] = $trx_id;
            $tdata['bank_number'] = $bank_number;
            $tdata['paymentMethod'] = $paymentMethod;
            $tdata['amount'] = $amount;

            $order_id = DB::table('transactions')
                   ->insertGetId($tdata);
                   
             return back()->with('success','Your Payment process successfully');         
        
    }
}
