<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $primaryKey = 'menu_id';
    public $incrementing = false;
    protected $keyType = 'string';
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

    // Define the many-to-many relationship with Role
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'menu_roles', 'menu_id', 'role_id');
    }
}
