<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperSession
 */
class Session extends Model
{
    use HasFactory;

    protected $casts = [
        'last_activity' => 'datetime',
    ];
}
