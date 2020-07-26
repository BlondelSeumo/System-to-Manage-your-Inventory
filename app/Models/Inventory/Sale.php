<?php

namespace App\Models\Inventory;

use App\Models\Common\Relationship;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table= 'sales';

    protected $guarded = ['id', 'created_at','updated_at','deleted_at'];

    protected $fillable = [
        'company_id',
        'invoiceno',
        'type',
        'invoicedate',
        'relationship_id',
        'invoice_amt',
        'paid_amt',
        'discount',
        'due_amt',
        'approver',
        'description',
        'status',
        'user_id',
    ];

    public function items()
    {
        return $this->hasMany(TransProduct::class,'refno','invoiceno');
    }

    public function relationship()
    {
        return $this->belongsTo(Relationship::class);
    }
}
