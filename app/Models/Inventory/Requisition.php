<?php

namespace App\Models\Inventory;

use App\Models\Common\Product;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    protected $table= 'requisitions';

    protected $guarded = ['id', 'created_at','updated_at','deleted_at'];

    protected $fillable = [
        'company_id',
        'refno',
        'reqtype',
        'reqdate',
        'approver',
        'description',
        'status',
        'admin_id',
    ];

    public function items()
    {
        return $this->hasMany(TransProduct::class,'refno','refno');
    }


}
