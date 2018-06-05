<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Address;
use App\Site;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
	
	public function __construct()
	{
		$this->authorizeResource(Customer::class);
	}
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
		// $user = Auth::getUser();
// dd(auth()->id());
			$this->authorize('create', Customer::class);
			$action = 'customer.create';
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
		// $user = Auth::getUser();
		$this->authorize('view', $customer );
		$action = 'customer.show';
		return view( 'customer.customer-mask', compact( 'customer', 'action') );
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
		$address = $customer->address;
		$site = New Site();
		$sites = $site->where( 'customer_id', $customer->id)->get();
        return view( 'customer.customer-mask', compact( 'customer', 'address', 'action', 'sites' ));
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

		$address = $request->only(['street', 'street_extra', 'post_code', 'city', 'state']);
		$customer->set_address($address);
		
		$data = request()->all();
		$customer->update($data);
		
		//sites
		//@TODO : enlever les names sur le mask adresse site pour ne pas l'avoir dans le request
		$sites = array_filter($data, function($key) {
			return strpos($key, 'site_adr_') === 0;
		},ARRAY_FILTER_USE_KEY);

		$customer->set_site( $sites );
		
		
		return redirect( '/customer/' . $customer->id );

    }

	public function destroy(Customer $customer)
    {
		// dd($machine);
        $machine->delete();
		return redirect('/machine');
    }
    
}
