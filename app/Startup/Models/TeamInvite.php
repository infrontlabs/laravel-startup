<?php

namespace Startup\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;


/**
 * @property    int                             $id
 * @property    string                          $email
 * @property    string                          $role
 * @property    int                             $account_id
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 */
class TeamInvite extends Model
{

    use HasTimestamps;


    protected $guarded = [];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
