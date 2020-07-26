<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id', 100)->index('guest_order_ibfk_1');
            $table->integer('guest_id')->unsigned()->index('guest_order_ibfk_2');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        Schema::table('guest_order', function(Blueprint $table)
        {
            $table->foreign('order_id', 'guest_order_ibfk_1')->references('id')->on('orders')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('guest_id', 'guest_order_ibfk_2')->references('id')->on('guests')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_order');
        Schema::table('guest_order', function(Blueprint $table)
        {
            $table->dropForeign('guest_order_ibfk_1');
            $table->dropForeign('guest_order_ibfk_2');
        });
    }
}
