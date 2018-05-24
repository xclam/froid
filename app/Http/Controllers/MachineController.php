<?php

namespace App\Http\Controllers;

use App\Machine;
use App\Customer;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machines = Machine::all();
		return view( 'machine.index', compact( 'machines' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$action = 'machine.create';
		$customers = Customer::pluck('name', 'id');
        return view( 'machine.machine-mask', compact( 'customers', 'action' ));
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
			'name' => 'required',
			'serial' => 'required'
		]);
		// dd($request);
		// dd( request()->all() );
		Machine::create( request()->all() );
		
		return redirect('/machine');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function show(Machine $machine)
    {
		$action = 'machine.show';
		$customers = Customer::pluck('name', 'id');
        return view( 'machine.machine-mask', compact( 'machine','customers','action' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function edit(Machine $machine)
    {
		$action = 'machine.edit';
        $customers = Customer::pluck('name', 'id');
        return view( 'machine.machine-mask', compact( 'machine', 'customers', 'action' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Machine $machine)
    {

		$machine->update($request->all());
		return redirect('/machine');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machine $machine)
    {
		// dd($machine);
        $machine->delete();
		return redirect('/machine');
    }
}
