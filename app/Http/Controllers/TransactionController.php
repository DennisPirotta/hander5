<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('transactions.index',[
            'transactions' => auth()->user()->transactions->load('customer')->sortByDesc('datetime')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('transactions.create',[
            'customers' => auth()->user()->customers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'amount' => ['required','numeric'],
            'payed' => ['required','boolean'],
            'customer_id' => ['required','exists:customers,id'],
            'date' => ['required','date'],
            'time' => 'nullable'
        ]);
        Transaction::create([
            'user_id' => auth()->id(),
            'amount' => $validated['amount'],
            'payed' => $validated['payed'],
            'customer_id' => $validated['customer_id'],
            'datetime' => Carbon::parse($validated['date'].' '.$validated['time'])
        ]);
        return redirect()->route('transactions.index')->with('message','Transazione creata con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param Transaction $transaction
     * @return Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Transaction $transaction
     * @return View
     */
    public function edit(Transaction $transaction): View
    {
        return view('transactions.edit',[
            'transaction' => $transaction->load('customer'),
            'customers' => auth()->user()->customers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Transaction $transaction
     * @return RedirectResponse
     */
    public function update(Request $request, Transaction $transaction): RedirectResponse
    {
        $validated = $request->validate([
            'amount' => ['required','numeric'],
            'payed' => ['required','boolean'],
            'customer_id' => 'required',
            'date' => ['required','date'],
            'time' => 'nullable'
        ]);
        $transaction->update([
            'amount' => $validated['amount'],
            'payed' => $validated['payed'],
            'customer_id' => $validated['customer_id'],
            'datetime' => Carbon::parse($validated['date'].' '.$validated['time'])
        ]);
        return redirect()->route('transactions.index')->with('message','Transazione aggiornata con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Transaction $transaction
     * @return RedirectResponse
     */
    public function destroy(Transaction $transaction): RedirectResponse
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('message','Transazione rimossa con successo');
    }
}
