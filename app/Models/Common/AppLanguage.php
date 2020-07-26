<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class AppLanguage extends Model
{
    protected $table= 'app_languages';

    protected $guarded = ['id', 'created_at','updated_at','deleted_at'];

}

