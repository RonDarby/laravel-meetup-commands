<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2014-10-29
 * Time: 01:50 AM
 */

namespace PayFast\Mailers;

use PayFast\Models\Orders;
use User;

class OrderStatusMailer extends Mailer
{
    public function orderStatusPending( User $user, Orders $order )
    {
        $subject = "Order #{$order->id} Pending";
        $view = 'emails.order.status.pending';
        $data = array(
            'username' => $user->username,
            'order_id' => $order->id
        );
        return $this->sendTo($user, $subject, $view, $data);
    }

    public function newOrderPlaced( User $user, Orders $orders )
    {

    }
} 