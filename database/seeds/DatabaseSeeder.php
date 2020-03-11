<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //DB::table('account_types')->truncate();
		//DB::table('users')->truncate();
		
        //$this->call(UsersTableSeeder::class);
        $this->call(AccoutTypeSeeder::class);
    }
}
