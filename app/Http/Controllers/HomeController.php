<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Images_Manager;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	
	public function config()
    {
		$company = Company::first();
        return view('config.index', compact( 'company' ));
    }
	
	public function modifycpy()
	{
		$action = 'config.editcpy';
		$company = Company::first();
		return view( 'config.modifycpy', compact( 'company', 'action' ) );
	}
	
	public function updatecpy(Request $request, Company $company)
	{
		// dd($request);
		//@TODO: delete old logo ?
		if ($request->hasFile('logo')) {
			$file = $request->file('logo');
			$im = new Images_Manager();
			$logo_id = $im->upload_img($file);
			$company->image_id = $logo_id;
		}
		$company->name = $request->get('name');
		$company->certificate = $request->get('certificate');
		$company->siret = $request->get('siret');
		
		$company->phone = $request->get('phone');
		$company->mobile = $request->get('mobile');
		$company->fax = $request->get('fax');
		$company->email = $request->get('email');
		$company->website = $request->get('website');

		$address = $request->only(['street', 'street_extra', 'post_code', 'city', 'state']);
		$company->set_address($address);
		// dd($company);
		$company->save();
		return redirect('/config');
		// dd($request);
	}
	
	public function test()
	{
		return view( 'test' );
	}
}
