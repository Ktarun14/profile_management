<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'profile_type',
        'is_default',
        'email',
        'mobile_number',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
