<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Validator;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$customers = Customer::simplePaginate(10);
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'email_verification' => 'required|same:email',
        ]);

        if($validator->passes()) {
            // where email is not unique
            // fix this
            $newCustomer = new Customer;
            $newCustomer->fill($request->all())->save();
            return redirect()->route('customer.index');
        } else {
            return redirect()->back()->withInput()->withErrors($validator)->with('message', 'Please fill out all required fields.');
        }
    }

    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

        if($validator->passes()) {
            $customer->fill($request->all())->save();
            return redirect()->route('customer.index');
        } else {
            return redirect()->back()->withInput()->withErrors($validator)->with('message', 'Please fill out all required fields.');
        }
    }

    public function destroy(Customer $customer)
    {
        //
    }
}
