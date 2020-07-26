<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\Order;
class Guest extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'home_address',
        'town',
        'country_id',
    ];

    /**
     * @return string
     */
    public function getUserName()
    {
        return beautify($this->first_name . " " . $this->last_name);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
//    public function county()
//    {
//        return $this->belongsTo(\App\Models\County::class);
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
