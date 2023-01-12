<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperReseller
 */
class Reseller extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'reseller_employee')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
