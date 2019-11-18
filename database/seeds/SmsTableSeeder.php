<?php

use Illuminate\Database\Seeder;

class SmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('sms')->insert([
        	'mobile'=> '22222',
        	'email'=> 'ratul@raul.com',
        	'name'=> 'ratul',
        	'religion'=> 'muslim',
        	'gender'=> 'male',
        	'education'=> 'Masters',
        	'blood_group'=> 'B+',
        	'division'=> 'Dhaka',
        ]);
    }
}
