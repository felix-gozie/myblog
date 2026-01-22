<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentCalculatorController extends Controller
{
    public function index()
    {
        return view('calculators.rent');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'income' => 'required|numeric|min:1',
        ]);

        $monthlyIncome = $request->income;
        $recommendedRent = $monthlyIncome * 0.3; // 30% rule

        return view('calculators.rent', [
            'recommendedRent' => $recommendedRent
        ]);
    }
}
