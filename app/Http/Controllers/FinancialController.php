<?php

namespace App\Http\Controllers;

use App\Financial;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    public function create($user, $incomeAmount, $payCheckTimeType, $payCheckTimeDay, $payCheckTimeDate, $savingsAmount, $ccDebtAmount)
    {

        $incomeAmount = floatval($incomeAmount);
        $savingsAmount = floatval($savingsAmount);
        $ccDebtAmount = floatval($ccDebtAmount);

        Financial::updateOrCreate(
            ['user_id' => $user->id],
            [
                'paycheck_amount'    => $incomeAmount,
                'paycheck_frequency' => $payCheckTimeType,
                'last_paycheck'      => $payCheckTimeDate,
                'paycheck_day'       => $payCheckTimeDay,
                'current_savings'    => $savingsAmount,
                'current_debt'       => $ccDebtAmount
            ]
        );

    }
}
