<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table= 'brands';
    protected $guarded = array('id');
}
