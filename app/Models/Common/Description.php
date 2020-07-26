<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $table= 'descriptions';
    protected $guarded = array('id');

    protected $fillable = [
        'company_id',
        'desc_type',
        'product_id',
        'description',
        'status',
        'admin_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
