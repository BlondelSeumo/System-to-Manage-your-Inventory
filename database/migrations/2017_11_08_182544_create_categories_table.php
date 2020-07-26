<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('name', 100)->unique('name');
            $table->unique(array('company_id','name'));
            $table->string('alias', 100)->nullable();
            $table->string('accno',8)->nullable();
            $table->boolean('status')->default(true);
            $table->string('locale',20)->default('en-US')->comments('English, Bangla');
            $table->decimal('inventory_amt',15,2)->default(0)->comment('Current balance * avg unit price'); //Amount calculated by current balance*avg unit proce
            $table->decimal('acc_balance',15,2)->default(0)->comment('General Ledger Balance');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('RESTRICT');
            $table->foreign('company_id')
                ->references('id')->on('companies')
                ->onDelete('RESTRICT');
        });

        DB::unprepared('CREATE TRIGGER copy_alias BEFORE INSERT ON categories FOR EACH ROW
                IF NEW.alias IS NULL OR LENGTH(NEW.alias) < 1 THEN
                SET NEW.alias := NEW.name;
                END IF;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
