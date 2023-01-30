<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperClient
 */
class Client extends Model
{
    use HasFactory;

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
}
