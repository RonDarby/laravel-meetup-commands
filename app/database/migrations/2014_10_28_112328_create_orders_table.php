<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'orders', function( $table )
        {
            $table->increments( 'id' );
            $table->string( 'products' );
            $table->float( 'total' );
            $table->integer( 'user_id' );
            $table->integer( 'status_id' );
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('orders');
	}

}
