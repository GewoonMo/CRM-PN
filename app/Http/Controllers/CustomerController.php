<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Profile;
use http\Client\Curl\User;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $customers = Customer::all();
        $users = auth()->user();
        return view('customer.all', compact('customers', 'users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
//        $this->authorize(' create-customer', $customer);

        // Render the create profile form
        return view('customer.create' , ['customer' => $customer]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request )
    {

        $this->authorize('create-customer');

        // Validate the form data
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'state' => ['nullable', 'string'],
            'zip' => ['nullable', 'string'],
            'country' => ['nullable', 'string'],
            'user_id' => ['nullable', 'integer'],
        ]);

        // Create a new profile for the authenticated user

        $customer = new Customer($data);

        // Save the updated profile
        $customer->save();

        return redirect()->route('customers.all', $customer->id)
            ->with('status', 'De klant '.$customer->name.' is met succes aangemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
         $this->authorize('view-customer', $customer);

        // Check if the profile exists
        if (!$customer) {
            return redirect()->route('home')->with('error', 'Klant niet gevonden');
        }
        return view('customer.show', [
            'customer' => $customer,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        if ($this->authorize('update-customer', $customer)){
            return view('customer.edit', ['customer' => $customer]);
        } else {
            return redirect()->route('customer.all');
        }
//        $this->authorize('update', $customer);
//        return view('customer.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $this->authorize('update-customer', $customer);

        // Update the customer

        $customerData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'state' => ['nullable', 'string'],
            'zip' => ['nullable', 'string'],
            'country' => ['nullable', 'string'],

        ]);

        $customer->update($customerData);

        // Redirect to the updated customer's page
        return redirect()->route('customers.all', $customer->id)
            ->with('status', 'De klant '.$customer->name.' is met succes bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $this->authorize('delete-customer', $customer);

        $customer->delete();

        return redirect()->route('customers.all')
            ->with('status', 'De klant '.$customer->name.' is met succes verwijderd!');

    }
}
