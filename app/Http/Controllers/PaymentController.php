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
         $bik_sender_num = $request->bik_sender_num;         
         $roc_sender_num = $request->roc_sender_num;         
         $bank_rec_num = $request->bank_rec_num;         
         $bkash_tran_id = $request->bkash_tran_id;         
         $rocket_tran_id = $request->rocket_tran_id;         
         $amount = $request->amount;         
         $tdata=array();
            $tdata['bik_sender_num'] = $bik_sender_num;
            $tdata['roc_sender_num'] = $roc_sender_num;
            $tdata['bank_rec_num'] = $bank_rec_num;
            $tdata['bkash_tran_id'] = $bkash_tran_id;
            $tdata['rocket_tran_id'] = $rocket_tran_id;
            $tdata['amount'] = $amount;

            $order_id = DB::table('transactions')
                   ->insertGetId($tdata);
                   
             return back()->with('success','Your Payment process successfully');         
        
    }
}
