<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_movements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('RESTRICT');
            $table->integer('refno',false)->unsigned();
            $table->date('tr_date');
            $table->bigInteger('barcode')->unsigned()->default(0);
            $table->integer('contra',false)->unsigned()->comments('Invoice No, Purchase Order No, Requisition No, Challan N');
            $table->char('reftype',3)->comments('PRC = Purchase Receive, SDL = Sales Delivery PRT = Purchase Return SRT= Sales Return'); //1 for consumption 2 for purchase
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
            $table->decimal('quantity',15,2)->default(0.00);
            $table->decimal('received',15,2)->default(0.00);
            $table->decimal('returned',15,2)->default(0.00);
            $table->decimal('delevered',15,2)->default(0.00);
            $table->decimal('unit_price',15,2)->default(0.00);
            $table->integer('tax_id')->unsigned()->default(1);
            $table->foreign('tax_id')->references('id')->on('taxes')->onDelete('restrict');
            $table->decimal('tax_total',15,2)->default(0.00);
            $table->decimal('total_price',15,2)->default(0.00);
            $table->string('remarks',190)->nullable();
            $table->tinyInteger('status',false)->unsigned()->default(1)->comments('1 = created, 2= approved, 3= purchased, 4= received, 5=delevered, 6= rejected, 7=closed');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->boolean('deleted')->default(false);
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
        Schema::dropIfExists('product_movements');
    }
}
