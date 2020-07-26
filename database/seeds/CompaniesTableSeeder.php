<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'group_comp_id' => '1',
            'comp_code' => '101001',
            'comp_name' => 'Abc Company',
            'address' => '22/10 Tajmahal Road, Mohammodpur',
            'city' => 'Dhaka',
            'country'=>'Bangladesh',
            'email' => 'admin@gmail.com',
            'fpstartdate'=>'2018-01-01'
        ]);
    }
}
