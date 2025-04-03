<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Models\Product;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    protected $primaryKey = 'product_image_id'; // Set primary key
    public $incrementing = false; // Disable auto-increment
    protected $keyType = 'string'; // UUID is a string
    public $timestamps = false;

    protected $fillable = [
        'product_image_id', 'product_id', 'product_image', 'created_by', 'created_date',
        'last_updated_by', 'last_updated_date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
