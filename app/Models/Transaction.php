<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

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

    public function reseller()
    {
        return $this->belongsTo(Reseller::class);
    }
}
