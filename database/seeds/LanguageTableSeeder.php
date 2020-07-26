<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_languages')->insert([
            'locale' => 'en-US',
            'name' => 'English US',
        ]);

        DB::table('app_languages')->insert([
            'locale' => 'bn-BD',
            'name' => 'Bengali',
        ]);

        DB::table('app_languages')->insert([
            'locale' => 'fr-FR',
            'name' => 'French',
        ]);

        DB::table('app_languages')->insert([
            'locale' => 'hi-IN',
            'name' => 'Indian',
        ]);
    }
}
