<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bargain extends Model
{
    use HasFactory;

    protected $table = 'bargains';
    protected $primaryKey = 'bargain_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'bargain_id',
        'user_id',
        'product_id',
        'offer_quantity',
        'offer_price',
        'status',
        'error_message',
        'created_by',
        'created_date',
        'last_updated_by',
        'last_updated_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
