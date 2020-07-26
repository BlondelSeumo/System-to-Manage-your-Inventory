<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class NameTranslation extends Model
{
    protected $table= 'name_translations';

    protected $guarded = ['id', 'created_at','updated_at','deleted_at'];

    protected $fillable = [
        'company_id',
        'table_id',
        'table_name',
        'locale',
        'data_id',
        'name',
        'description',
    ];
}
