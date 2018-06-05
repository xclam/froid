<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
	
	public function index()
	{
        return view( 'user.index', [ 'users' => User::all() ] );
    }
	
	public function store(Request $request)
    {
		User::create( $request->all() );
		
		return redirect('/user');
    }
	
	public function show( User $user )
	{
		$action = 'user.show';
        return view( 'user.user-mask', compact( 'user', 'action') );
    }
	
	public function edit( User $user )
	{
		$action = 'user.edit';
		$roles = Role::all();
        return view( 'user.user-mask', compact( 'user', 'action', 'roles') );
    }
	
	public function update(Request $request, User $user)
    {
		// dd($request);
		$user->update( $request->all() );
		$user->roles()->attach( $request->get('roles') );
		
		return redirect( '/user/' . $user->id );

    }

	public function destroy(Customer $customer)
    {
        $customer->delete();
		return redirect('/user');
    }
}
