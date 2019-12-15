<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
        	[
        		'name' => 'Majestic Admin',
	        	'email' => 'majestic@gmail.com',
	        	'password' => bcrypt('d6t243fbgm'),
	        	'email_verified_at' => Carbon::now()
        	]
        );
    }
}
