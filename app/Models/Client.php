<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperClient
 */
class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_ppn' => 'boolean',
    ];

    /**
     * Relation to User (Client account)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation to bandwidth
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bandwidth()
    {
        return $this->belongsTo(Bandwidth::class);
    }

    /**
     * Relation to reseller
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reseller()
    {
        return $this->belongsTo(Reseller::class);
    }

    /**
     * Scope a query to only include ppn client.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopePpn(Builder $query)
    {
        return $query->where('is_ppn', true);
    }
}
