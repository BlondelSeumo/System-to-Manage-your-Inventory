<?php

namespace App\Models\Inventory;

use App\Models\Common\Product;
use Illuminate\Database\Eloquent\Model;

class ProductMovement extends Model
{
    protected $table= 'product_movements';

    protected $guarded = ['id', 'created_at','updated_at','deleted_at'];

    protected $fillable = [
        'company_id',
        'refno',
        'barcode',
        'contra',
        'reftype',
        'tr_date',
        'product_id',
        'quantity',
        'received',
        'returned',
        'delevered',
        'unit_price',
        'tax_id',
        'tax_total',
        'total_price',
        'remarks',
        'status',
    ];

    public function item()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function getReftypeAttribute($value)
    {
//        if($value=='CP')
//        {
//            $value = 'CASH PAYMENT';
//        }
        switch ($value) {
            case 'PRC':
                $value = 'RECEIVED AGAINST PURCHASE';
                break;
            case 'SDL':
                $value = 'DELIVERY AGAINST SALES';
                break;
            case 'BP':
                $value = 'BANK PAYMENT';
                break;
            case 'BR':
                $value = 'BANK RECEIPT';
                break;
            case 'JV':
                $value = 'JOURNAL';
                break;
        }
        return $value;

    }
}
