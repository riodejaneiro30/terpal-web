<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';
    protected $primaryKey = 'product_category_id'; // Set primary key
    public $incrementing = false; // Disable auto-increment
    protected $keyType = 'string'; // UUID is a string
    public $timestamps = false;

    protected $fillable = [
        'product_category_id', 'product_category_name', 'created_by', 'created_date', 
        'last_updated_by', 'last_updated_date'
    ];
}
