<?php

namespace Startup\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;
use Startup\Traits\HasSubscriptions;
use Startup\Traits\HasTeam;

/**
 * @property    int                             $id
 * @property    string                          name
 * @property    int                             $owner_id
 * @property    string|null                     $billing_name
 * @property    string|null                     $stripe_id
 * @property    string|null                     $card_brand
 * @property    string|null                     $card_last_four
 * @property    \Carbon\Carbon                  $trial_ends_at
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 */
class Account extends Model implements \JsonSerializable
{
    use Billable, HasSubscriptions, HasTeam, HasTimestamps;

    protected $guarded = [];

    protected $casts = [
        'trial_ends_at' => 'date',
    ];

    protected $dates = ['trial_ends_at', 'created_at', 'updated_at',];


    public function getRouteKeyName()
    {
        return 'hash_id';
    }

    public function getHashIdAttribute()
    {
        return app('hashid')->encode($this->id); // VolejRejNm
    }

    /**
     * @return array
     */
    public function jsonSerialize ()
    {
        return [
            'id' => $this->hash_id,
            'name' => $this->name,
            'card_brand' => $this->card_brand,
            'card_last_four' => $this->card_last_four,
        ];
    }

}
