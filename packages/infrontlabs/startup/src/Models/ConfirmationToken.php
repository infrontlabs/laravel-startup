<?php

namespace InfrontLabs\Startup\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ConfirmationToken extends Model
{
    public $timestamps = false;

    protected $dates = [
        'expired_at',
    ];

    protected $fillable = [
        'token',
        'expires_at',
    ];

    public static function boot()
    {
        static::creating(function ($token) {
            optional($token->user->confirmationToken)->delete();
        });
    }

    public function getRouteKeyName()
    {
        return 'token';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasExpired()
    {
        return $this->freshTimestamp()->gt($this->expires_at);
    }
}
