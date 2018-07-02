<?php

namespace App\Http\Controllers;

use App\Site;
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
      $fluids = Fluid::all();
      return view( 'machine.machine-mask', compact( 'customers', 'action', 'fluids' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $machine = Machine::create( request()->all() );
      $this->add_fluid( $machine, $request->get('fluid') );

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
  		$sites = Site::where('customer_id', $machine->customer_id)->get();
      return view( 'machine.machine-mask', compact( 'machine', 'customers', 'action', 'fluids', 'sites' ));
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
		  $machine->update( $request->all() );
      $this->add_fluid( $machine, $request->get('fluid') );

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
  	   try{
         $machine->fluids()->detach();
         $machine->delete();
       }catch(\Illuminate\Database\QueryException $e) {
         if($e->getCode() == "23000"){ //23000 is sql code for integrity constraint violation
           return 23000;
         }
       }
       return redirect('/machine');
    }

    public function add_fluid(Machine $machine, $fluids){
      if( null !== $fluids and is_array( $fluids ) ){
  	    $f = array();
    		foreach( $fluids as $fluid ){
    			$f[$fluid['fluid_id']] = [ 'load' => $fluid['load'] ];
    		}
  		  $machine->fluids()->sync( $f );
      }
    }
}
