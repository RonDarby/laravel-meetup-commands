<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function($table)
        {
            $table->increments ( 'id' );
            $table->string( 'payment_id' );
            $table->integer( 'order_id' );
            $table->integer( 'status' );
            $table->float( 'gross_amount' );
            $table->float( 'cost_amount' );
            $table->float( 'net_amount' );
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
        Schema::drop('transactions');
	}

}
