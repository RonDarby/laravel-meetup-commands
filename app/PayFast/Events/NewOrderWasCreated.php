<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2014-10-29
 * Time: 12:36 AM
 */

namespace PayFast\Events;
use PayFast\Models\Orders;

class NewOrderWasCreated {

    public $order;

    public function __construct ( Orders $order )
    {
        $this->order = $order;
    }


} 