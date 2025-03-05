<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'role_id';
    public $incrementing = false; // Disable auto-increment
    protected $keyType = 'string'; // UUID is a string
    public $timestamps = false;

    protected $fillable = [
        'role_id',
        'role_name',
        'role_description',
        'created_by',
        'created_date',
        'last_updated_by',
        'last_updated_date'
    ];
}
