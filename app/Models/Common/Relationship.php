<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $guarded = array('id');


    protected $fillable = [
        'company_id',
        'type',
        'name',
        'tax_number',
        'email',
        'glcode',
        'street',
        'address',
        'city',
        'state',
        'country',
        'zipcode',
        'phone_number',
        'fax_number',
        'website',
        'asigned',
        'default_price',
        'default_discount',
        'default_payment_term',
        'default_payment_method',
        'min_order_value',
        'status',
        'locale',
        'admin_id',
        'deleted'
    ];

}
