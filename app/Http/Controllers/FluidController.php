<?php

namespace App\Http\Controllers;

use App\Fluid;
use Illuminate\Http\Request;

class FluidController extends Controller
{
     public function index()
	{
        return view( 'fluid.index', [ 'fluids' => Fluid::all() ] );
    }
	
	public function create()
    {
		$action = 'fluid.create';
        return view( 'fluid.fluid-mask', compact( 'fluid', 'action') );
    }
	
	public function store(Request $request)
    {
		Fluid::create( $request->all() );
		
		return redirect('/fluid');
    }
	
	public function show( Fluid $fluid )
	{
		$action = 'fluid.show';
        return view( 'fluid.fluid-mask', compact( 'fluid', 'action') );
    }
	
	public function edit( Fluid $fluid )
	{
		$action = 'fluid.edit';
        return view( 'fluid.fluid-mask', compact( 'fluid', 'action') );
    }
	
	public function update(Request $request, Fluid $fluid)
    {
		$fluid->update( $request->all() );
		
		return redirect( '/fluid/' . $fluid->id );

    }

	public function destroy(Customer $customer)
    {
        $customer->delete();
		return redirect('/fluid');
    }
}
