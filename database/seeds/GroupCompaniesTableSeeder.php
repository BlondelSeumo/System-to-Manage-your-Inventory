<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_companies')->insert([
            'gcomp_code' => '101',
            'gcomp_name' => 'Abc Group.',
            'city' => 'Dhaka',
            'country'=>'Bangladesh',
            'email' => 'ancgroup@gmail.com'
        ]);
    }
}
