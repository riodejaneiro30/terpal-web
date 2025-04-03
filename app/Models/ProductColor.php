<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductColor extends Model
{
    use HasFactory;

    protected $table = 'product_colors';
    protected $primaryKey = 'product_color_id'; // Set primary key
    public $incrementing = false; // Disable auto-increment
    protected $keyType = 'string'; // UUID is a string
    public $timestamps = false;

    protected $fillable = [
        'product_color_id', 'product_color', 'created_by', 'created_date',
        'last_updated_by', 'last_updated_date'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'color_id', 'product_color_id');
    }
}
