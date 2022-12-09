<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('customers.index',[
            'customers' => auth()->user()->customers->sortByDesc(static function ($item){
                return $item->exchanges()->get('debits')['total'];
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws \JsonException
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required','string']
        ]);
        $validated['user_id'] = auth()->id();
        $customer = Customer::create($validated);
        return redirect()->route('customers.index')->with('message','Cliente inserito con successo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return Application|Factory|View
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit',[
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Customer $customer
     * @return Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Customer $customer
     * @return RedirectResponse
     * @throws \JsonException
     */
    public function destroy(Request $request,Customer $customer): RedirectResponse
    {
        $request->validate([
            'customer-name' => ['required','in:'.$customer->name]
        ]);
        $customer->delete();
        return redirect()->route('customers.index');
    }
}
