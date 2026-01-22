<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanCalculatorController extends Controller
{
    public function index()
    {
        return view('calculators.loan');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'rate'   => 'required|numeric|min:0',
            'months' => 'required|numeric|min:1',
        ]);

        $amount = $request->amount;
        $rate   = $request->rate / 100 / 12;
        $months = $request->months;

        if ($rate == 0) {
            $monthlyPayment = $amount / $months;
        } else {
            $monthlyPayment = ($amount * $rate) /
                (1 - pow(1 + $rate, -$months));
        }

        $totalPayment = $monthlyPayment * $months;

        return view('calculators.loan', [
            'monthlyPayment' => round($monthlyPayment, 2),
            'totalPayment'   => round($totalPayment, 2),
        ]);
    }
}
