<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2014-10-28
 * Time: 07:54 PM
 */

namespace PayFast\Orders;


class PlaceNewOrderCommand {

    public $product_id;

    public function __construct( $product_id )
    {
        $this->product_id = $product_id;
    }

} 