<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2014-10-29
 * Time: 12:14 AM
 */

namespace PayFast\Orders;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use PayFast\Models\Orders;

class PlaceNewOrderCommandHandler implements CommandHandler {

    use DispatchableTrait;

    public $order;

    function __construct ( Orders $order )
    {
        $this->order = $order;
    }

    /**
     * Handle the command
     *
     * @param $command
     *
     * @return mixed
     */
    public function handle ( $command )
    {
        $order = $this->order->newOrder( $command->product_id );

        $this->dispatchEventsFor( $order );

        return $order;
    }
}