<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profiles';
    protected $primaryKey = 'user_profile_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'user_profile_id',
        'user_id',
        'gender',
        'phone_number',
        'date_of_birth',
        'address',
        'role_id',
    ];

    /**
     * Get the user associated with the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
