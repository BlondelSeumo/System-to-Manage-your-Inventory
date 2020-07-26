<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('RESTRICT');
            $table->string('name',160);
            $table->string('product_code',8);
            $table->unique(array('company_id', 'product_code'));
            $table->integer('relationship_id')->unsigned()->nullable()->index('FK_products_relationships');
            $table->foreign('relationship_id')->references('id')->on('relationships')->onDelete('restrict');
            $table->integer('brand_id')->unsigned()->nullable()->index('FK_products_brands');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('restrict');
            $table->integer('category_id')->unsigned()->index('FK_products_categories');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
            $table->integer('subcategory_id')->unsigned()->nullable()->index('FK_products_sub_categories');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('restrict');
            $table->string('unit_name',10)->index('FK_products_units');
            $table->foreign('unit_name')->references('name')->on('units')->onUpdate('CASCADE')->onDelete('restrict');
            $table->boolean('varient')->default(0);
            $table->integer('size_id')->unsigned()->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('restrict');
            $table->integer('color_id')->unsigned()->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('restrict');
            $table->string('sku', 50);
            $table->unique(array('company_id','sku'));
            $table->integer('product_model_id')->unsigned()->nullable()->index('FK_products_models');
            $table->foreign('product_model_id')->references('id')->on('product_models')->onDelete('restrict');
            $table->integer('tax_id')->unsigned()->nullable()->index('FK_products_tax');
            $table->foreign('tax_id')->references('id')->on('taxes')->onDelete('restrict');
            $table->integer('godown_id')->unsigned()->nullable()->index('FK_products_godowns');
            $table->foreign('godown_id')->references('id')->on('godowns')->onDelete('restrict');
            $table->integer('rack_id')->unsigned()->nullable()->index('FK_products_racks');
            $table->foreign('rack_id')->references('id')->on('racks')->onDelete('restrict');
            $table->decimal('initial_price',15,2)->default(0.00);
            $table->decimal('buy_price',15,2)->default(0.00);
            $table->decimal('wholesale_price',15,2)->default(0.00);
            $table->decimal('retail_price',15,2)->default(0.00);
            $table->decimal('unit_price',15,2)->default(0.00);
            $table->decimal('reorder_point',15,2)->default(0);
            $table->decimal('opening_qty',15,2)->default(0);
            $table->decimal('opening_value',15,2)->default(0);
            $table->decimal('onhand',15,2)->default(0);
            $table->decimal('committed',15,2)->default(0);
            $table->decimal('incomming',15,2)->default(0);
            $table->decimal('maxonlinestock',15,2)->default(0);
            $table->decimal('minonlineorder',15,2)->default(0);
            $table->decimal('purchase_qty',15,2)->default(0);
            $table->decimal('sell_qty',15,2)->default(0);
            $table->decimal('salvage_qty',15,2)->default(0);
            $table->decimal('received_qty',15,2)->default(0);
            $table->decimal('return_qty',15,2)->default(0);
            $table->integer('shipping')->unsigned()->nullable()->default(0);
            $table->decimal('discount', 15, 2)->default(0);
            $table->text('description_short')->nullable();
            $table->text('description_long')->nullable();
            $table->text('stuff_included')->nullable();
            $table->float('warranty_period', 10, 0)->unsigned()->nullable();
            $table->string('image',195)->nullable();
            $table->string('image_large',195)->nullable();
            $table->boolean('sellable')->default(true);
            $table->boolean('purchasable')->default(true);
            $table->boolean('b2bpublish')->default(false);
            $table->boolean('free')->unsigned()->default(0);
            $table->boolean('taxable')->unsigned()->default(1);
            $table->boolean('status')->unsigned()->default(1);
            $table->string('locale',20)->default('en-US')->comments('English, Bangla');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('RESTRICT');
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
        Schema::dropIfExists('products');
    }
}
