<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cart_id', 100)->index('FK_cart_contains_many_products');
            $table->integer('product_id')->unsigned()->index('FK_cart_product_products');
            $table->integer('quantity')->unsigned()->default(1);
            $table->timestamps();
        });

        Schema::table('cart_product', function(Blueprint $table)
        {
            $table->foreign('cart_id', 'FK_cart_contains_many_products')->references('id')->on('carts')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('product_id', 'FK_cart_product_products')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_product');
    }
}
