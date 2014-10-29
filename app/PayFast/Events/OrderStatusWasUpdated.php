<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2014-10-28
 * Time: 11:23 PM
 */

namespace PayFast\Events;
use PayFast\Models\Orders;

class OrderStatusWasUpdated {

    public $order;

    public function __construct ( Orders $order )
    {
        $this->order = $order;
    }
}