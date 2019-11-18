<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::Table('roles')->insert([
        	'type'=> 'Admin',
        	'slug'=> 'admin'
        ]);

        DB::Table('roles')->insert([
        	'type'=> 'Officestaff',
        	'slug'=> 'officestaff'
        ]);

        DB::Table('roles')->insert([
        	'type'=> 'Dataentry',
        	'slug'=> 'dataentry'
        ]);
    }
}
