<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class IdentityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('identities')->insert([
        	[ 'title' => 'Bedrooms', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        	[ 'title' => 'Bathroom', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        	[ 'title' => 'Living Room', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        	[ 'title' => 'Kitchen/Dining', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        	[ 'title' => 'Laundry', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        	[ 'title' => 'Separate Toilet', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        	[ 'title' => 'Garage', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        	[ 'title' => 'Balcony', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        	[ 'title' => 'Study Room', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
