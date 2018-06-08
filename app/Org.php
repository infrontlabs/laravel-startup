<?php

namespace App;

use App\Org\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class Org extends Model
{
    use Billable;

    protected $guarded = [];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

}
