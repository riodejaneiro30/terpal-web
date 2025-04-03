<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'product_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'product_id', 'product_name', 'product_category_id', 'type', 'width', 'length', 'height', 'color_id',
        'stock_available', 'price', 'product_image', 'net_price', 'min_stock', 'product_description',
        'created_by', 'created_date', 'last_updated_by', 'last_updated_date'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->product_id = (string) Str::uuid();
        });
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'product_category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'color_id', 'product_color_id');
    }
}
