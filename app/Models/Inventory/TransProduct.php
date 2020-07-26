<?php

namespace App\Models\Inventory;

use App\Models\Common\Product;
use Illuminate\Database\Eloquent\Model;

class TransProduct extends Model
{
    protected $table= 'trans_products';

    protected $guarded = ['id', 'created_at','updated_at','deleted_at'];

    protected $fillable = [
        'company_id',
        'refno',
        'contra',
        'reftype',
        'towhome',
        'product_id',
        'name',
        'quantity',
        'unit_price',
        'tax_id',
        'tax_total',
        'total_price',
        'approved',
        'purchased',
        'sold',
        'received',
        'returned',
        'delevered',
        'remarks',
        'status',
    ];

    public function item()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function requisition()
    {
        return $this->belongsTo(Requisition::class,'refno','refno');
    }
}
