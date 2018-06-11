<?php

namespace App;

use App\Account\Models\Document;
use App\Account\Traits\HasSubscriptions;
use App\Account\Traits\HasTeam;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class Account extends Model
{
    use Billable, HasSubscriptions, HasTeam;

    protected $guarded = [];

    protected $casts = [
        'trial_ends_at' => 'date',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

}
