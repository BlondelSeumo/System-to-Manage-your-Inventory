<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gcomp_code',false)->unique();
            $table->string('gcomp_name',190);
            $table->string('city',200);
            $table->string('state',200)->nullable();
            $table->string('post_code',200)->nullable();;
            $table->string('country',100);
            $table->string('phone_no',200)->nullable();;
            $table->string('email',190)->unique()->nullable();
            $table->string('website',190)->nullable();
            $table->char('currency',3)->nullable();
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
        Schema::dropIfExists('group_companies');
    }
}
