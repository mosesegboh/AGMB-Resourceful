<?php

use Illuminate\Database\Seeder;

class AccoutTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_types')->insert([
        	'name' => 'Fixed Account',
        	'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        	'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
