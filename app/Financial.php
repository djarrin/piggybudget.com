<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    /**
     * @var string Table name
     */
    protected $table = 'financials';
    /**
     * @var array Fillable fields
     */
    protected $fillable = ['user_id', 'paycheck_amount', 'paycheck_frequency', 'last_paycheck', 'paycheck_day', 'current_savings', 'current_debt'];
}
