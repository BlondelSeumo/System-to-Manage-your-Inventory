<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class FiscalPeriod extends Model
{
    protected $table= 'fiscal_period';
    protected $guarded = array('id');

    protected $fillable = [
        'company_id',
        'fiscal_year',
        'year',
        'fp_no',
        'month_sl',
        'month_name',
        'start_date',
        'end_date',
        'status',
        'depriciation'];
}
