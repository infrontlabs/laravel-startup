<?php

namespace App\Account\Models;

use App\Account\Traits\HasSubscriptions;
use App\Account\Traits\HasTeam;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;
use Ramsey\Uuid\Uuid;

class Account extends Model
{
    use Billable, HasSubscriptions, HasTeam;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (Uuid::uuid4())->toString();
        });
    }

    protected $casts = [
        'trial_ends_at' => 'date',
    ];

}
