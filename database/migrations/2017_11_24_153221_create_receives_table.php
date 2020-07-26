<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('RESTRICT');
            $table->integer('refno',false)->unsigned()->comments('purchase ref#, l/c #');
            $table->date('rdate');
            $table->integer('contra',false)->unsigned()->comments('Invoice No, Purchase Order No, Requisition No, Challan N');
            $table->integer('relationship_id')->unsigned()->nullable()->index('FK_purchase_relationships')->comments('Suppliers');
            $table->foreign('relationship_id')->references('id')->on('relationships')->onDelete('restrict');
            $table->decimal('invoice_amt',15,2)->default(0.00);
            $table->decimal('receive_amt',15,2)->default(0.00);
            $table->string('description')->nullable();
            $table->tinyInteger('status',false)->unsigned()->default(1)->comments('1 = created, 2= approved, 3= received, 4= purchased,  5=delevered, 6= rejected, 7=closed');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('admins')->onDelete('cascade');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->boolean('deleted')->default(false);
            $table->softDeletes(); // <-- This will add a deleted_at field
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receives');
    }
}
