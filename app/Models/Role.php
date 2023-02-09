<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as BaseRole;

/**
 * @mixin IdeHelperRole
 */
class Role extends BaseRole
{
    use HasFactory;

    /**
     * Admin
     *
     * @param string
     */
    const ADMIN = 'Admin';

    /**
     * Reseller Owner
     *
     * @param string
     */
    const RESELLER_OWNER = 'Reseller_Owner';

    /**
     * Reseller Admin
     *
     * @param string
     */
    const RESELLER_ADMIN = 'Reseller_Admin';

    /**
     * Reseller technician
     *
     * @param string
     */
    const RESELLER_TECHNICIAN = 'Reseller_Technician';

    /**
     * Client
     *
     * @param string
     */
    const CLIENT = 'Client';
}
