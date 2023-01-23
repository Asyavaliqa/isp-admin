<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */

namespace App\Models{
    /**
     * App\Models\Bandwidth
     *
     * @property int $id
     * @property int $reseller_id
     * @property string $name
     * @property int $bandwidth
     * @property string $price
     * @property string|null $description
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Reseller $reseller
     *
     * @method static \Illuminate\Database\Eloquent\Builder|Bandwidth newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Bandwidth newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Bandwidth query()
     * @method static \Illuminate\Database\Eloquent\Builder|Bandwidth whereBandwidth($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Bandwidth whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Bandwidth whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Bandwidth whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Bandwidth whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Bandwidth wherePrice($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Bandwidth whereResellerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Bandwidth whereUpdatedAt($value)
     */
    class IdeHelperBandwidth
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Client
     *
     * @property int $id
     * @property int $user_id
     * @property int $bandwidth_id
     * @property int $reseller_id
     * @property string|null $payment_due_date
     * @property int $is_ppn
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Bandwidth $bandwidth
     * @property-read \App\Models\Reseller $reseller
     * @property-read \App\Models\User $user
     *
     * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Client query()
     * @method static \Illuminate\Database\Eloquent\Builder|Client whereBandwidthId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Client whereIsPpn($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Client wherePaymentDueDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Client whereResellerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Client whereUserId($value)
     */
    class IdeHelperClient
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Reseller
     *
     * @property int $id
     * @property int $user_id Owner
     * @property string|null $name Company Name
     * @property string|null $photo
     * @property string|null $email Company Email
     * @property string|null $phone_number Company Phone Number
     * @property string|null $address Company Address
     * @property \Illuminate\Support\Carbon|null $contract_start_at
     * @property \Illuminate\Support\Carbon|null $contract_end_at
     * @property \Illuminate\Support\Carbon|null $inactive_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $clients
     * @property-read int|null $clients_count
     * @property-read \App\Models\User $user
     *
     * @method static \Database\Factories\ResellerFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller query()
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller whereAddress($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller whereContractEndAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller whereContractStartAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller whereInactiveAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller wherePhoneNumber($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller wherePhoto($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reseller whereUserId($value)
     */
    class IdeHelperReseller
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Session
     *
     * @property int $id
     * @property int|null $user_id
     * @property string|null $ip_address
     * @property string|null $user_agent
     * @property string $payload
     * @property \Illuminate\Support\Carbon $last_activity
     *
     * @method static \Illuminate\Database\Eloquent\Builder|Session newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Session newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Session query()
     * @method static \Illuminate\Database\Eloquent\Builder|Session whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Session whereIpAddress($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Session whereLastActivity($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Session wherePayload($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Session whereUserAgent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Session whereUserId($value)
     */
    class IdeHelperSession
    {
    }
}

namespace App\Models{
    /**
     * App\Models\User
     *
     * @property int $id
     * @property string $username
     * @property string $email
     * @property string $password
     * @property string|null $fullname
     * @property string|null $photo
     * @property string|null $address
     * @property string|null $nik
     * @property string|null $phone_number
     * @property string|null $birthday
     * @property mixed|null $gender
     * @property string|null $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Client|null $client
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read int|null $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
     * @property-read int|null $permissions_count
     * @property-read \App\Models\Reseller|null $reseller
     * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
     * @property-read int|null $roles_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Session[] $sessions
     * @property-read int|null $sessions_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
     * @property-read int|null $tokens_count
     *
     * @method static \Database\Factories\UserFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
     * @method static \Illuminate\Database\Eloquent\Builder|User query()
     * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthday($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereFullname($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereNik($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoto($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
     */
    class IdeHelperUser
    {
    }
}
