<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class Returned extends Model
{
    protected $table= 'returns';

    protected $guarded = ['id', 'created_at','updated_at','deleted_at'];

    protected $fillable = [
        'company_id',
        'refno',
        'rdate',
        'contra',
        'relationship_id',
        'invoice_amt',
        'return_amt',
        'description',
        'status',
        'user_id',
    ];

    public function items()
    {
        return $this->hasMany(TransProduct::class,'refno','refno');
    }
}
