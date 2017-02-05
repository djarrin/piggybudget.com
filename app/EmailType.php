<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailType extends Model
{
    /**
    * @var string Table name
    */
    protected $table = 'email_type';
    /**
     * @var array Fillable fields
     */
    protected $fillable = ['user_id', 'weeklyBills', 'monthsBills','paycheckBills', 'ccPayment'];

    public function setting()
    {
        return $this->hasOne(Setting::class);
    }
}
