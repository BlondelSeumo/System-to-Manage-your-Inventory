<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER new_comp_properties AFTER INSERT ON companies FOR EACH ROW
                BEGIN
                   
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, \'CP\',\'Cash Payment\',\'100000\');

                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, \'CR\',\'Cash Receipt\',\'200000\');
                    
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, \'BP\',\'Bank Payment\',\'300000\');
                    
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, \'BR\',\'Bank Receipt\',\'400000\');
                    
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, \'JV\',\'Journal\',\'500000\');
                    
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, \'SI\',\'Sales Invoice\',\'600000\');
                    
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, \'PR\',\'Purchase\',\'700000\');
                    
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, \'DC\',\'Delivery Challan\',\'800000\');
                    
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, \'RQ\',\'Requisition\',\'900000\');
                                                                                
                    INSERT INTO admins(company_id,name,email,password,role) VALUES(NEW.id,NEW.comp_name,NEW.email, ENCRYPT(\'pass123\'),\'Admin\');

                END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger_company');
    }
}
