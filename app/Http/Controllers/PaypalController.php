<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{
    public function getExpressCheckout ($orderId) {

        $data = $this->checkoutData($orderId);
        $provider = new ExpressCheckout;
        //$provider = PayPal::setProvider('express_checkout');

        $response = $provider->setExpressCheckout($data, true);

        //dd($response);

        return redirect($response['paypal_link']);
    }

    private function checkoutData($orderId){
        $cart = Cart::where('user_id', auth()->id());

        $cartItems = array_map(function($item){
            return [
               'name'=> $item['name'],
               'price'=> $item['price'],
               'qty'=> $item['quantity']
            ];
        }, $cart->get()->toArray());

        $data = [
            'items'=> $cartItems,
            'return_url'=>route('paypal.success', $orderId),
            'cancel_url'=>route('paypal.cancel'),
            'invoice_id'=> uniqid(),
            'invoice_description'=> 'Order description',
            'total'=> Cart::where('user_id', auth()->id())->sum('price')
        ];

        return $data;
    }

    public function newone () {
       echo "hello";
    }

    public function cancelPage () {
        dd('payment failed');
    }

    public function getExpressCheckoutSuccess (Request $request, $orderId) {
        $token = $request->get('token');
        $payerId = $request->get("PayerID");
        $provider = new ExpressCheckout;
        $data = $this->checkoutData($orderId);

        $response = $provider->getExpressCheckoutDetails($token);

        if(in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $payment_status = $provider->doExpressCheckoutPayment($data, $token, $payerId);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

            if(in_array($status, ['Completed', 'Processed'])) {
                Cart::where('user_id', auth()->id())->delete();

                $order = Order::find($orderId);
                $order->is_paid = 1;
                $order->save();

                Mail::to($order->user->email)->send(new OrderMail($order));

                return redirect()->route('home')->withMessage('Payment Successful');
            }


        }

        return redirect()->route('home')->withMessage('Payment UnSuccessful, Something went wrong');

    }
}
