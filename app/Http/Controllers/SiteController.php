<?php

namespace App\Http\Controllers;
use App\Site;


use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function list_machine(Request $request)
	{
		$site = Site::find($request->get('id'));
		return $site->machines;
	}
}
