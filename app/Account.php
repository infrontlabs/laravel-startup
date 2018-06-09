<?php

namespace App;

use App\Account\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class Account extends Model
{
    use Billable;

    protected $guarded = [];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

}
