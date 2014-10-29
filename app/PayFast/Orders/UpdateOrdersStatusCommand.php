<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2014-10-28
 * Time: 04:36 PM
 */

namespace PayFast\Orders;


class UpdateOrdersStatusCommand {

    public $status_id;
    public $order_id;

    public function __construct( $order_id, $status_id )
    {
        $this->order_id = $order_id;
        $this->status_id = $status_id;
    }
} 