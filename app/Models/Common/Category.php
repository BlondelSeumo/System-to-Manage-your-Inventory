<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table= 'categories';
    protected $guarded = array('id');

    public function titles()
    {
        return $this->hasMany(NameTranslation::class,'data_id','id')->where('table_id',10);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }


}
