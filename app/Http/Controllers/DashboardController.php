<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $transactions = auth()->user()->transactions->groupBy('amount')->sortKeys();
        $chartData = [];
        foreach ($transactions as $amount=>$transaction){
            $chartData[] = [
                'x' => (string)$amount,
                'y' => $transaction->count(),
                'fillColor' => fake()->hexColor()
            ];
        }
        return view('dashboard.index',[
            'transactions' => $chartData
        ]);
    }
}
