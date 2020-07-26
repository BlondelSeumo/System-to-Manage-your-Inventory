<?php

namespace App\Models;

use App\Models\Common\Product;
use app\Util\Modules\ShoppingCart\Traits\ReconcilerTrait;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use ReconcilerTrait;

    public $incrementing = false;

    protected $fillable = ['product_id', 'cart_id', 'quantity'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
