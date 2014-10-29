<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2014-10-28
 * Time: 07:45 PM
 */

namespace PayFast\Models;

use Laracasts\Commander\Events\EventGenerator;
use PayFast\Events\OrderStatusWasUpdated;
use PayFast\Events\NewOrderWasCreated;
use \Product;
use \Status;


class Orders extends \Eloquent {

    use EventGenerator;

    protected $fillable = ['status_id','products','total','user_id'];

    public function updateStatus( $status_id )
    {
        $this->status_id = $status_id;
        $this->save();

        $this->raise( new OrderStatusWasUpdated( $this ) );
        return $this;
    }

    public function newOrder( $product_id )
    {
        $product = Product::whereId( $product_id )->first();
        $pending = Status::whereSlug( 'pending' )->first();

        $this->products = $product->id;
        $this->total = $product->price;
        $this->user_id = \Auth::id();
        $this->status_id = $pending->id;
        $this->save();
        $this->product = $product;
        $this->raise( new NewOrderWasCreated( $this ) );

        return $this;
    }
} 