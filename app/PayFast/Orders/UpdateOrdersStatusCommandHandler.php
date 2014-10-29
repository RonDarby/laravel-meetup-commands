<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2014-10-28
 * Time: 06:09 PM
 */

namespace PayFast\Orders;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use PayFast\Models\Orders;

class UpdateOrdersStatusCommandHandler implements CommandHandler {

    use DispatchableTrait;

    public $order;

    public function __construct( Orders $order )
    {
        $this->order = $order;
    }

    public function handle( $command )
    {
        $order = $this->order->whereId( $command->order_id )->first();
        $order->updateStatus( $command->status_id );

        $this->dispatchEventsFor( $order );

        return $order;
    }

} 