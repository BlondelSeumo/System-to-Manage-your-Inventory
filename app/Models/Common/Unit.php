<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table= 'units';
    protected $guarded = array('id');

    public function titles()
    {
        return $this->hasMany(NameTranslation::class,'data_id','id')->where('table_id',12);
    }
}
