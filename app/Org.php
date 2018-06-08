<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class Org extends Model
{
    use Billable;

    protected $guarded = [];

}
