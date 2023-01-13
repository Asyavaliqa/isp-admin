<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperBandwidth
 */
class Bandwidth extends Model
{
    use HasFactory;

    public function reseller()
    {
        return $this->belongsTo(Reseller::class);
    }
}
