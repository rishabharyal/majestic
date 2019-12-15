<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user) {
        	DB::table('model_has_roles')->insert([
        		'role_id' => 1,
        		'model_type' => 'Add\User',
        		'model_id' => $user->id
        	]);
        }
    }
}
