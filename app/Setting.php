<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['receive_emails', 'user_id'];

    public function emailType()
    {
        return $this->hasOne(EmailType::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
