<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = Customer::latest()->get();
        $title = 'Customers';
        return view('customers.index', compact(['model', 'title']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $model = new Customer();
        $title = 'Tambah data';
        return view('customers.form', compact('model', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('customers')->with('success', 'Data customer berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $model = Customer::findOrFail($id);
        $title = 'Edit data';
        return view('customers.form', compact('model', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $customer = Customer::findOrFail($id);
        $customer->update($requestData);

        return redirect()->route('customers')->with('success', 'Data customer berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
