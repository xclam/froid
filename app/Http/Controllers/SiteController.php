<?php

namespace App\Http\Controllers;
use App\Site;
use App\Address;


use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function list_machine(Request $request)
	{
		$site = Site::find($request->get('id'));
		// dd($site->machines);
		return $site->machines;
	}

	public function update(Request $request, Site $site)
    {
		$site->update( $request->all() );
	}

	/*******************************************************
	 * API
	 *******************************************************/
	public function get_site($id)
	{
		$action = "customer.site.edit";
		$site = Site::find($id);
		return view( 'site.api.create_edit_form', compact( 'site', 'action' ) );
	}

	public function ajaxupdate(Request $request, Site $site)
    {
		$site->update( $request->all() );
		return '<div class="card-header">
					<h5 class="card-title">'.$site->name.'</h5>
					<button type="button" class="close" data-onclick="delete_site" data-id="'.$site->id.'" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="card-body ">
					<div>SIRET : '.$site->siret.'</div>
					<div>'.$site->address.'</div>
				</div>';
	}

	public function ajaxcreate($customer_id)
    {
		$action = "customer.site.create";
		return view( 'site.api.create_edit_form', compact( 'action', 'customer_id' ));
	}

	public function ajaxstore(Request $request)
    {
		$address = Address::create( $request->all() );
		$address->site()->create( $request->all() );
		return '<div class="col-4 row-eq-height mt-3">
			<div class="card input-field customer-site-card field-card" data-onclick="edit_customer_site" data-id="'.$address->site->id.'" >
				<div class="card-header">
					<h5 class="card-title">'.$address->site->name.'</h5>
					<button type="button" class="close" data-onclick="delete_site" data-id="'.$address->site->id.'" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="card-body ">
					<div>SIRET : '.$address->site->siret.'</div>
					<div>'.$address->site->address.'</div>
				</div>';
	}

	public function ajaxremove($site_id)
    {
		$site = Site::find($site_id);
		if(isset($site->address->id))
			$address = Address::destroy($site->address->id);

		try{
			$site->delete();
		}catch(\Illuminate\Database\QueryException $e) {
			if($e->getCode() == "23000"){ //23000 is sql code for integrity constraint violation
				// return error to user here
				// return $e->getMessage();
				return ['error' => 23000, 'html' => '<div class="modal-dialog">
    			<div class="modal-content">
    				<div class="modal-header">
    					<h5 class="modal-title">'.__("Error").' '.__("Constraint violation").'</h5>
    					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
    					</button>
    				</div>
    				<div class="modal-body ">
    					<div>'.__("One or more object using this entry").'</div>
    				</div>
          </div>
        </div>'];
			}
		}

		return 'ok';
	}


}
