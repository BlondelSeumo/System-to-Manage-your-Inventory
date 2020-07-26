<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table= 'colors';
    protected $guarded = array('id');
}
