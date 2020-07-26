<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $incrementing = false;

    public $fillable = ['data'];

    /**
     * @param $data
     */
    public function setDataAttribute($data)
    {
        $this->attributes['data'] = is_serialized($data) ? $data : serialize($data);
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function getDataAttribute($data)
    {
        return unserialize($data);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {

        return $this->belongsTo(Order::class);
    }
}
