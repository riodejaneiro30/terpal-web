<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MenuRole extends Pivot
{
    protected $table = 'menu_roles';

    protected $fillable = [
        'menu_id',
        'role_id',
    ];

    // Optional: If you want to add timestamps to the pivot table
    public $timestamps = true;
}
