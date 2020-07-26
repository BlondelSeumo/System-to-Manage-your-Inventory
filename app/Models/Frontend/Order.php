<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use App\Models\Common\Product;
use App\Models\Frontend\Guest;
use App\Models\Frontend\Invoice;
use App\User;

class Order extends Model
{
    public $incrementing = false;

    protected $casts = [
        'delivered' => 'boolean',
    ];

    /**
     * @param $value
     *
     * @return string
     */
    public function setDataAttribute($value)
    {
        $this->attributes['data'] = is_serialized($value) ? $value : serialize($value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function getDataAttribute($value)
    {
        return is_serialized($value) ? unserialize($value) : $value;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps()->withPivot('quantity');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function guests()
    {
        return $this->belongsToMany(Guest::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
