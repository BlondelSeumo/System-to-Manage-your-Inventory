<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table='payments';
    protected $guarded = array('id');
}
