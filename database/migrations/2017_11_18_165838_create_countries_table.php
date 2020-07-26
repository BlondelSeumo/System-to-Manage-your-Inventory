<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->char('countrycode_a',2)->unique();
            $table->char('countrycode_n',3)->unique();
            $table->string('country_name',60);
            $table->string('nick_name',60)->nullable();
            $table->char('currencycode_n',4)->nullable();
            $table->char('currencycode_a',3)->nullable();
            $table->string('currency',60)->nullable();
            $table->string('currencysymble',4)->nullable();
            $table->string('phonecode',10)->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
