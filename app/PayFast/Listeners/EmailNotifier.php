<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2014-10-29
 * Time: 01:14 AM
 */

namespace PayFast\Listeners;


use Laracasts\Commander\Events\EventListener;
use PayFast\Events\NewOrderWasCreated;
use PayFast\Events\OrderStatusWasUpdated;
use Status;
use PayFast\Mailers\OrderStatusMailer;
use User;

class EmailNotifier extends EventListener {

    public function whenNewOrderWasCreated( NewOrderWasCreated $event )
    {
        dd($event);
    }

    public function whenOrderStatusWasUpdated( OrderStatusWasUpdated $event )
    {
        $status = Status::whereId( $event->order->status_id )->first();
        $mailer = new  OrderStatusMailer();

        switch( $status->slug )
        {
            case 'pending':
                $buyer = User::whereId( $event->order->user_id )->first();
                $mailer->orderStatusPending( $buyer, $event->order );
                break;
            case 'complete':

                break;
            case 'cancelled':

                break;
            case 'processing':

                break;
        }

    }

}