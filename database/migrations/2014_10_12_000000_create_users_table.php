<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',191)->unique();
            $table->string('town',60);
            $table->string('address',190);
            $table->binary('avatar', 16777215)->nullable();
            $table->bigInteger('phone');
            $table->string('password',60);
            $table->date('dob')->nullable();
            $table->enum('gender', array('Female','Male'))->nullable();
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
            $table->timestamp('lastlogin')->nullable();
            $table->ipAddress('visitor')->nullable();
            $table->integer('wrongpasscount',false)->default(0);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('users');
    }
}
