<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table= 'purchases';

    protected $guarded = ['id', 'created_at','updated_at','deleted_at'];

    protected $fillable = [
        'company_id',
        'refno',
        'type',
        'pdate',
        'relationship_id',
        'invoice_amt',
        'paid_amt',
        'due_amt',
        'discount',
        'approver',
        'description',
        'status',
        'user_id',
    ];

    public function items()
    {
        return $this->hasMany(TransProduct::class,'refno','refno');
    }
}
