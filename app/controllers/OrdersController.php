<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2014-10-28
 * Time: 02:52 PM
 */

use Laracasts\Commander\CommanderTrait;
use PayFast\Orders\UpdateOrdersStatusCommand;
use PayFast\Orders\PlaceNewOrderCommand;

class OrdersController extends BaseController {

    use CommanderTrait;

    public function getIndex()
    {
        $orders = Order::all();
        View::make( 'page.orders', compact( 'orders' ) );
    }

    public function postPlace()
    {
        Auth::loginUsingId(1);


        $order = $this->execute( PlaceNewOrderCommand::class );


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
                $order->product->price.'&item_name='.urlencode( $order->product->name ).'&m_payment_id='.$order->id;

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

        $this->execute( UpdateOrdersStatusCommand::class );
        // Update the order status
        // Email Buyer
        // Email Seller
        // Update Stock Levels
    }

    public  function getOrderUpdate()
    {
        Input::merge( array( 'status_id' => 1, 'order_id' => 1 ) );
        $this->execute( UpdateOrdersStatusCommand::class );
    }

} 