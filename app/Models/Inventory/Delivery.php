<?php

namespace App\Models\Inventory;

use App\Models\Common\Relationship;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table= 'deliveries';

    protected $guarded = ['id', 'created_at','updated_at','deleted_at'];

    protected $fillable = [
        'company_id',
        'challan_no',
        'cdate',
        'contra',
        'relationship_id',
        'invoice_amt',
        'delivery_amt',
        'description',
        'approver',
        'status',
        'user_id',
    ];

    public function items()
    {
        return $this->hasMany(ProductMovement::class,'refno','challan_no');
    }

    public function relationship()
    {
        return $this->belongsTo(Relationship::class);
    }
}
