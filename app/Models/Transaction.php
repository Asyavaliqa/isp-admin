<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperTransaction
 */
class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Purchase of a new data package
     *
     * @var int
     */
    const TYPE_NEW_PURCHASE = 1;

    /**
     * Old data plan extension
     *
     * @var int
     */
    const TYPE_EXTENSION = 2;

    /**
     * Upgrade old data plan to new
     *
     * @var int
     */
    const TYPE_UPGRADE = 3;

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
     * Relation to client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
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
}
