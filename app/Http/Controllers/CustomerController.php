<?php

namespace App\Http\Controllers;

use App\Customer;
use App\AllCities; 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $customers = Customer::with('user')->latest()->get();
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data['cities'] = AllCities::all();
        return view('customer.create',$data);
    }

    
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->branch_id = 1;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->sale_tax = $request->sale_tax;
        $customer->fuel_surcharge = $request->fuel_surcharge;
        $customer->password = Hash::make($request->password);

        $store = $customer->save();

        if ($store){
            $customer->client_code = 10000+$customer->id;
            $customer->save();
            return redirect(route('customers.index'))->with('success', 'Customer created successfully');
        }
        return redirect(route('customers.index'))->with('warning', 'Customer could not be create');
    }

    /**
     * Display the specified resource.
     *
     * @return void
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return Response
     */
    public function edit(Customer $customer)
    {
        $cities = AllCities::all();
        return view('customer.edit', compact('customer','cities'));
    }

  
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->city = $request->city;
        $customer->sale_tax = $request->sale_tax;
        $customer->fuel_surcharge = $request->fuel_surcharge;
        $customer->address = $request->address;
        if(!empty($request['password'])){
            $customer->password = Hash::make($request->password);
        }
        $update = $customer->save();

        if ($update){
            return redirect(route('customers.index'))->with('success', 'Customer update successfully');
        }
        return back()->with('warning', 'Customer could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return Response
     * @throws \Exception
     */
    public function destroy(Customer $customer)
    {

        if ($customer->delete()){
            return back()->with('success', 'Customer delete successfully');
        }
        return back()->with('warning', 'Customer could not be delete');
    }
}
