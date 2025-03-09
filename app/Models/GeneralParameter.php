<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralParameter extends Model
{
    use HasFactory;

    protected $table = 'general_parameters';
    protected $primaryKey = 'general_parameter_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'general_parameter_id',
        'general_parameter_key',
        'general_parameter_description',
        'general_parameter_value',
        'created_by',
        'created_date',
        'last_updated_by',
        'last_updated_date'
    ];
}
