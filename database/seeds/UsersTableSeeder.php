<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('users')->insert([
			'name'=> 'Admin',
			'role_id'=>'1',
	        'user_id'=> '11111',
	        'email'=> 'admin@admin.com',
	        'user_type'=> 'Admin',
	        'contact'=> '99999',
	        'password'=> Hash::make('abc123')
        ]);

        DB::Table('users')->insert([
			'name'=> 'Office Staff',
			'role_id'=>'2',
	        'user_id'=> '22222',
	        'email'=> 'staff@staff.com',
	        'user_type'=> 'Office Staff',
	        'contact'=> '66666',
	        'password'=> Hash::make('abc123')
        ]);

        DB::Table('users')->insert([
			'name'=> 'Data Entry',
			'role_id'=>'3',
	        'user_id'=> '33333',
	        'email'=> 'entry@entry.com',
	        'user_type'=> 'Data Entry',
	        'contact'=> '44444',
	        'password'=> Hash::make('abc123')
        ]);
    }
}
