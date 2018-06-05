<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index()
	{
        return view( 'role.index', [ 'roles' => Role::all() ] );
    }
	
	public function create()
    {
		$action = 'role.create';
        return view( 'role.role-mask', compact( 'role', 'action') );
    }
	
	public function store(Request $request)
    {
		Role::create( $request->all() );
		
		return redirect('/role');
    }
	
	public function show( Role $role )
	{
		$action = 'role.show';
        return view( 'role.role-mask', compact( 'role', 'action') );
    }
	
	public function edit( Role $role )
	{
		$action = 'role.edit';
        return view( 'role.role-mask', compact( 'role', 'action') );
    }
	
	public function update(Request $request, Role $role)
    {
		$role->update( $request->all() );
		
		return redirect( '/role/' . $role->id );

    }

	public function destroy(Customer $customer)
    {
        $customer->delete();
		return redirect('/role');
    }
}
