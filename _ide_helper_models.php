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
     * @property string|null $price
     * @property string|null $description
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Client> $clients
     * @property-read int|null $clients_count
     * @property-read \App\Models\Reseller $reseller
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bandwidth newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bandwidth newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bandwidth query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bandwidth whereBandwidth($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bandwidth whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bandwidth whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bandwidth whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bandwidth whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bandwidth wherePrice($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bandwidth whereResellerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bandwidth whereUpdatedAt($value)
     *
     * @mixin \Eloquent
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
     * @property bool $is_ppn
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Bandwidth $bandwidth
     * @property-read \App\Models\Reseller $reseller
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
     * @property-read int|null $transactions_count
     * @property-read \App\Models\User $user
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client ppn()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereBandwidthId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereIsPpn($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client wherePaymentDueDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereResellerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereUserId($value)
     *
     * @mixin \Eloquent
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
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Client> $clients
     * @property-read int|null $clients_count
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $employees
     * @property-read int|null $employees_count
     * @property-read string $balance
     * @property-read int $balance_int
     * @property-read \Bavix\Wallet\Models\Wallet $wallet
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Bavix\Wallet\Models\Transaction> $transactions
     * @property-read int|null $transactions_count
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Bavix\Wallet\Models\Transfer> $transfers
     * @property-read int|null $transfers_count
     * @property-read \App\Models\User $user
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Bavix\Wallet\Models\Transaction> $walletTransactions
     * @property-read int|null $wallet_transactions_count
     *
     * @method static \Database\Factories\ResellerFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller whereAddress($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller whereContractEndAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller whereContractStartAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller whereInactiveAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller wherePhoneNumber($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller wherePhoto($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reseller whereUserId($value)
     *
     * @mixin \Eloquent
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
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session whereIpAddress($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session whereLastActivity($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session wherePayload($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session whereUserAgent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session whereUserId($value)
     *
     * @mixin \Eloquent
     */
    class IdeHelperSession
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Transaction
     *
     * @property int $id
     * @property string $invoice_id
     * @property int $type
     * @property string $balance
     * @property string|null $bill_photo
     * @property int|null $reseller_id
     * @property string $reseller_name
     * @property int|null $client_id
     * @property string $client_name
     * @property int|null $bandwidth_id
     * @property string $bandwidth_name
     * @property string|null $accepted_at
     * @property string|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Bandwidth|null $bandwidth
     * @property-read \App\Models\Client|null $client
     * @property-read \App\Models\Reseller|null $reseller
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereAcceptedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereBalance($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereBandwidthId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereBandwidthName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereBillPhoto($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereClientId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereClientName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereInvoiceId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereResellerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereResellerName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereType($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Transaction whereUpdatedAt($value)
     *
     * @mixin \Eloquent
     */
    class IdeHelperTransaction
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
     * @property \Illuminate\Support\Carbon|null $birthday
     * @property mixed|null $gender
     * @property string|null $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Client|null $client
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
     * @property-read int|null $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
     * @property-read int|null $permissions_count
     * @property-read \App\Models\Reseller|null $reseller
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
     * @property-read int|null $roles_count
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Session> $sessions
     * @property-read int|null $sessions_count
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
     * @property-read int|null $tokens_count
     *
     * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User permission($permissions)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User role($roles, $guard = null)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAddress($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBirthday($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFullname($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereGender($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereNik($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePhoneNumber($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePhoto($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUsername($value)
     *
     * @mixin \Eloquent
     */
    class IdeHelperUser
    {
    }
}
