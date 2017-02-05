<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'intro_survey_completed',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setting()
    {
        return $this->hasOne(Setting::class);
    }

    public function emailType()
    {
        return $this->hasOne(EmailType::class);
    }

    public function financial()
    {
        return $this->hasOne(Financial::class);
    }
}
