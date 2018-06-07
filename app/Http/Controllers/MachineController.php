<?php

namespace App\Http\Controllers;

use App\Fluid;
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
		$customers = Customer::all();
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
		$customers = Customer::all();
		$fluids = Fluid::all();
        return view( 'machine.machine-mask', compact( 'machine','customers','action', 'fluids'  ) );
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
        $customers = Customer::all();
		$fluids = Fluid::all();
        return view( 'machine.machine-mask', compact( 'machine', 'customers', 'action', 'fluids' ));
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
// dd($request->get('leak_detector') );
		$machine->update( $request->all() );
		
		// $fluids = $request->get('fluid');
		// foreach($fluids as $fluid){
			// $machine->fluids()->save(
				// new Fluid([
					// 'name' => $fluid['type'],
					// 'fluid_load' => $fluid['load']
				// ])
			// );
		// }
		// dd($request->get('fluid'));
		$machine->fluids()->sync( $request->get('fluid') );
		
		return redirect('/machine/'.$machine->id);
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
