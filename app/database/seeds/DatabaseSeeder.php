<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('AllTablesSeeder');
	}

}

class AllTablesSeeder extends Seeder {

    public function run()
    {
        DB::table('users')
            ->insert(array(
                'username'   => 'admin',
                'password'   => Hash::make('1qazxsw2'),
                'email'      => 'ron@cozareg.co.za',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ));

        DB::table( 'products' )
            ->insert( array(
                array(
                    'name' => 'Product One',
                    'price' => 12.25
                    ),
                array(
                    'name' => 'Easy Command',
                    'price' => 75.42
                ),
                array(
                    'name' => 'Events',
                    'price' => 23.12
                ),
                array(
                    'name' => 'Domains',
                    'price' => 25.98
                )
            ));

        DB::table('status')->insert(array(

            array(
                'id' => 1,
                'title' => 'Pending',
                'description' => 'Order Pending',
                'slug' => 'pending',
            ),

            array(
                'id' => 2,
                'title' => 'Complete',
                'description' => 'Order Complete',
                'slug' => 'complete',
            ),

            array(
                'id' => 3,
                'title' => 'Cancelled',
                'description' => 'Order Cancelled',
                'slug' => 'cancelled',
            ),
            array(
                'id' => 4,
                'title' => 'Processing',
                'description' => 'Order being Processed',
                'slug' => 'processing',
            )

        ));
    }

}


