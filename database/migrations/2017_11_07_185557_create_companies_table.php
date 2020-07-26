<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_comp_id',false)->unique();
            $table->integer('comp_code',false)->unique();
            $table->string('rooturl',160)->default('http://localhost:8000');
            $table->string('comp_name',200);
            $table->string('address',200);
            $table->string('city',200);
            $table->string('state',200)->nullable();
            $table->string('post_code',200)->nullable();;
            $table->string('country',100);
            $table->string('phone_no',200)->nullable();;
            $table->string('email',190)->unique()->nullable();
            $table->string('website',190)->nullable();
            $table->char('currency',3)->default('BDT');
            $table->date('fpstartdate');
            $table->boolean('inventory')->default(0);
            $table->boolean('project')->default(true);
            $table->boolean('accounts')->default(true);
            $table->boolean('ecom')->default(true);
            $table->integer('cash',false)->default(101);
            $table->integer('bank',false)->default(102);
            $table->integer('sales',false)->default(301);
            $table->integer('purchase',false)->default(401);
            $table->string('locale',20)->default('en-US')->comments('English, Bangla');
            $table->boolean('posted')->default(false);
            $table->boolean('status')->default(true);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->rememberToken();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
