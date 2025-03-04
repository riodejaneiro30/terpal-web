<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $primaryKey = 'menu_id';
    public $incrementing = false; // Disable auto-increment
    protected $keyType = 'string'; // UUID is a string
    public $timestamps = false;

    protected $fillable = [
        'menu_id',
        'menu_name',
        'menu_description',
        'created_by',
        'created_date',
        'last_updated_by',
        'last_updated_date'
    ];
}
