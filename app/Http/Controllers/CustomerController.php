<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
		return view( 'customer.index', compact( 'customers' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$action = 'customer.create';
        // return view( 'customer.create', compact( 'action' ) );
		return view( 'customer.customer-mask', compact( 'action' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate( request(), [
			'name' => 'required'
		]);
		//@TODO create Address
		$add = new Address();
		$data = request()->all();
		$data['is_active'] = 1;		//@TODO add by default
		// dd($add);	
		$add->save( $data );
	// dd($add);	
		$data['address_id'] = $add->id;
		
		Customer::create( $data);
		
		return redirect('/customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
		$action = 'customer.show';
		$address = $customer->get_address();
		return view( 'customer.customer-mask', compact( 'customer', 'address', 'action' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
		$action = 'customer.edit';
		$address = $customer->get_address();
        return view( 'customer.customer-mask', compact( 'customer', 'address', 'action' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
		// $customer->siret       = $request->get('siret');
		$add = $customer->get_address();
		if($add->exists()){
			$add->street = $request->input('street');
			// $add->is_active = 1; 		// @TODO : to remove
			// $add->fill(['street'=>'abc'])->save();
			$add->update($request->all());
		} else {
			$add = new Address();
			$data = request()->all();
			$data['is_active'] = 1;
			$add->create( $data );
		}
		$data = request()->all();
		$data['address_id'] = $add->id;
		$customer->update($data);
		
		
		return redirect( '/customer/' . $customer->id );

    }

	public function destroy(Customer $customer)
    {
		// dd($machine);
        $machine->delete();
		return redirect('/machine');
    }
    
}
