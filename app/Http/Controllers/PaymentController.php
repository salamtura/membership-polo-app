<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

//        dd($paymentDetails);

        $id = Auth::id();
        // Getting the specific student and his details

        $inv_id = $paymentDetails['data']['metadata']['invoiceId'];// Getting InvoiceId I passed from the form
        $invnum = $paymentDetails['data']['metadata']['invnum'];
        $status = $paymentDetails['data']['status']; // Getting the status of the transaction
        $amount = $paymentDetails['data']['amount']; //Getting the Amount
        $payRef = $paymentDetails['data']['reference'];
        $fee = $paymentDetails['data']['fees'];
        $number = $randnum = rand(1111111111,9999999999);// this one is specific to application
        $number = 'year'.$number;

        Payment::create(['invoice_id'=>$inv_id,
            'invoice_num'=> $invnum,
            'amount'=> $amount/100,
            'status'=> $status,
            'user_id'=> $id,
            'pay_ref'=> $payRef,
            'fee' => $fee/100
        ]); // Storing the payment in the database

        if($status == "success"){ //Checking to Ensure the transaction was succesful
            $invoice = Invoice::query()->where('id','=',$inv_id)->first();
//            $invoice->update(['pay_ref' => $number,'status' => 'paid']);
            $invoice->payment_ref = $payRef;
            $invoice->payment_mode = 'online';
            $invoice->payment_date = Carbon::now();
            $invoice->status = 'paid';
            $invoice->save();
//
        }

        return view('invoices',[
            'user' => Auth::user(),
        ]);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
