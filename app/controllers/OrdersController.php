<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2014-10-28
 * Time: 02:52 PM
 */

class OrdersController extends BaseController {

    public function getIndex()
    {
        $orders = Order::all();
        View::make( 'page.orders', compact( 'orders' ) );
    }

    public function postPlace()
    {
        Auth::loginUsingId(1);
        // TODO: Add some validation
        $product_id = Input::get( 'product_id' );
        $product = Product::find( $product_id );

        $pending = Status::whereSlug( 'pending' )->first();


        $order = new Order();
        $order->products = $product->id;
        $order->total = $product->price;
        $order->user_id = Auth::id();
        $order->status_id = $pending->id;
        $order->save();

        if( $order->id )
        {
            $payfast = Config::get('payfast');

            $url = 'https://';

            if( $payfast['sandbox'] )
            {
                $url .= 'sandbox';
                $merchant_id = '10000100';
                $merchant_key = '46f0cd694581a';
            }
            else
            {
                $url .= 'www';
                $merchant_id = $payfast['merchant_id'];
                $merchant_key = $payfast['merchant_key'];
            }

            $url .= '.payfast.co.za/eng/process?merchant_id='.$merchant_id.'&merchant_key='.$merchant_key.'&amount='.
                $product->price.'&item_name='.urlencode( $product->name ).'&m_payment_id='.$order->id;

            return Redirect::to( $url );
        }
        else
        {
            return Redirect::back()->withErrors( ['msg' => 'Could not place order'] );
        }


    }

    public function postItn()
    {
        // Some validation
        // Check if transaction duplicate, if not create a transaction and continue

        // Update the order status
        // Email Buyer
        // Email Seller
        // Update Stock Levels
    }

} 