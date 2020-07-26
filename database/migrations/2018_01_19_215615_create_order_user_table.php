<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id', 100)->index('order_user_ibfk_1');
            $table->integer('user_id')->unsigned()->index('order_user_ibfk_2');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        Schema::table('order_user', function(Blueprint $table)
        {
            $table->foreign('order_id', 'order_user_ibfk_1')->references('id')->on('orders')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id', 'order_user_ibfk_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_user');

        Schema::table('order_user', function(Blueprint $table)
        {
            $table->dropForeign('order_user_ibfk_1');
            $table->dropForeign('order_user_ibfk_2');
        });
    }
}
