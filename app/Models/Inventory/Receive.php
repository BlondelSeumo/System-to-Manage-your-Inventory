<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    protected $table= 'receives';

    protected $guarded = ['id', 'created_at','updated_at','deleted_at'];

    protected $fillable = [
        'company_id',
        'refno',
        'rdate',
        'contra',
        'relationship_id',
        'invoice_amt',
        'receive_amt',
        'description',
        'status',
        'user_id',
    ];

    public function items()
    {
        return $this->hasMany(ProductMovement::class,'refno','refno');
    }
}
