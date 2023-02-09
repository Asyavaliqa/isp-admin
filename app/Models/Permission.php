<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as BasePermission;

/**
 * @mixin IdeHelperPermission
 */
class Permission extends BasePermission
{
    use HasFactory;
}
