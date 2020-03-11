<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'fullname' => 'Moses Egboh',
			'username' => 'mosesegboh',
			'email' => 'mosesegboh@yahoo.com',
			'password' => Hash::make('mosesegboh'),
			'address' => '6, Jeminatu Stree',
			'phone' => '2348176431888',
			'activate' => 1,
			'admin' => 1,
			'auditor' => 1,
			'manager' => 1,
			'job_title_id' => 1,
			'department_id' => 1,
        	'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        	'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
