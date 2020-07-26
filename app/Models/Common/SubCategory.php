<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table= 'sub_categories';
    protected $guarded = array('id');

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'subcategory_id');
    }

    public function titles()
    {
        return $this->hasMany(NameTranslation::class,'data_id','id')->where('table_id',11);
    }
}
