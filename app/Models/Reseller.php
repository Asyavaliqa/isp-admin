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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'photo',
        'email',
        'phone_number',
        'address',
        'contract_start_at',
        'contract_end_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'contract_start_at' => 'date',
        'contract_end_at' => 'date',
        'inactive_at' => 'date',
    ];

    public function clients()
    {
        return $this->belongsToMany(User::class, 'reseller_employee')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
