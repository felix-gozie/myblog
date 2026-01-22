<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryTaxController extends Controller
{
    public function index()
    {
        return view('calculators.salary-tax');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'monthly_salary' => 'required|numeric|min:1',
        ]);

        $monthlySalary = $request->monthly_salary;
        $annualSalary  = $monthlySalary * 12;

        // Nigerian PAYE – CRA
        $cra = max(
            (0.20 * $annualSalary) + 200000,
            0.01 * $annualSalary
        );

        $taxableIncome = max($annualSalary - $cra, 0);

        // Simplified PAYE bands (estimate)
        $tax = 0;

        $bands = [
            300000  => 0.07,
            300000  => 0.11,
            500000  => 0.15,
            500000  => 0.19,
            1600000 => 0.21,
        ];

        foreach ($bands as $limit => $rate) {
            if ($taxableIncome > 0) {
                $amount = min($taxableIncome, $limit);
                $tax += $amount * $rate;
                $taxableIncome -= $amount;
            }
        }

        if ($taxableIncome > 0) {
            $tax += $taxableIncome * 0.24;
        }

        return view('calculators.salary-tax', [
            'monthlySalary' => $monthlySalary,
            'annualSalary'  => $annualSalary,
            'annualTax'     => round($tax, 2),
            'monthlyTax'    => round($tax / 12, 2),
        ]);
    }
}
