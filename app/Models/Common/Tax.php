<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table= 'taxes';
    protected $guarded = array('id');
}
