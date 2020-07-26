<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table= 'countries';
    protected $guarded = array('id');
}
