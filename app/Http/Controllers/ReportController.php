<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Auth;

use App\Company;
use App\Report;
use App\Site;
use App\Machine;
use App\Customer;
use App\Media;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		if( $request->get('s') !== null ){
			// dd($request);
			$reports = Report::where('number', 'like', '%'.$request->get('s').'%' )->get();
		}else{
			$reports = Report::all();
		}
		$my_reports = Report::where([
			[ 'user_id' , Auth::id() ],
			[ 'is_open' , '1']
		])->get();
		return view( 'report.index', compact( 'reports', 'my_reports' ) );
    }

	public function step( Request $request, $step = null, Report $report = null )
	{
		
		if( $step == 1 ){
			$customers = Customer::pluck('name', 'id');
			$machines = Machine::all();
			$sites = Site::all();
			$next = "step-2";
			return view( 'report.create', compact( 'customers', 'machines', 'sites', 'step' , 'next') );
		}
		
		if( $report == null )
			$report = new Report();
		$user = Auth::user();

		
		if( $step == 2 ){
			if( $request->isMethod('post') ){ // check first request to know if 
				$report->customer_id = $request->input('customer_id');
				$report->machine_id = $request->input('machine_id');
				$report->site_id = $request->input('site_id');
				$report->intervention_date = $request->input('intervention_date');
				$report->is_cerfa = $request->is_cerfa !== null;
				// if( !$report->is_cerfa )
					// $step = 5;
				$report->step = $step;
				$report->is_open = 1;
				$report->is_validate = 0;
				$report->user_id = $user->id;
				$report->save();
				$report->number = "FF".date("Ymd").sprintf('%05d', $report->id);
				$report->save();
			}
			$next = "step-".($step+1);
			return view( 'report.create', compact( 'report' , 'step' , 'next') );
		}
		
		if( $step == 3 ){
			if( $request->isMethod('post') ){
				$report = Report::find( $request->get('id') );
				$report->intervention_type = implode( '-', $request->get('ndi') );
				$report->other = $request->get('other');
				$report->technician_observations = $request->get('technician_observations');
			}
			if( !$report->is_cerfa )
					$step = 5;
			$report->step = $step;
			$report->save();
			$next = "step-".($step+1);
			return view( 'report.create', compact( 'report', 'step' , 'next') );
		}
		
		if( $step == 4 ){
			if( $request->isMethod('post') ){
				$report = Report::find( $request->get('id') );
				$report->detector = $request->get('detector');
				$report->fluid_amount = $request->get('qdf');
				$report->leak_system = $request->get('sdf');
				$report->is_leak = $request->get('is_leak');
				$report->fc1 = $request->get('fc1');
				$report->fcr1 = $request->get('fcr1');
				$report->fc2 = $request->get('fc2');
				$report->fcr2 = $request->get('fcr2');
				$report->fc3 = $request->get('fc3');
				$report->fcr3 = $request->get('fcr3');
			}
			$report->step = $step;
			$report->save();
			$next = "step-5";
			return view( 'report.create', compact( 'report', 'step' , 'next') );
		}
		
		if( $step == 5 ){
			if( $request->isMethod('post') ){
				$report = Report::find( $request->get('id') );
				$report->fluide_vierge = $request->get('fluide_vierge');
				$report->fluide_recycle = $request->get('fluide_recycle');
				$report->fluide_regenere = $request->get('fluide_regenere');
				$report->fluide_traitement = $request->get('fluide_traitement');
				$report->fluide_conserve = $request->get('fluide_conserve');
				$report->contenant = $request->get('contenant');
			}
			$report->step = $step;
			$report->save();
			$next = "step-6";
			return view( 'report.create', compact( 'report', 'step' , 'next') );
		}
		
		if( $step == 6 ){
			if( $request->isMethod('post') ){
				$report = Report::find( $request->get('id') );
				
				$report->performance = $request->get('performance');
				$report->to_be_done = $request->get('to_be_done');
				
				$report->atam = $request->get('atam');
				$report->atpm = $request->get('atpm');
				$report->atnty = $request->get('atnty');
				$report->dtam = $request->get('dtam');
				$report->dtpm = $request->get('dtpm');
				$report->dtnty = $request->get('dtnty');
				$report->travel_time = $request->get('travel_time');
				
				$report->yn_epi = $request->get('yn_epi') !== null;
				$report->yn_outil = $request->get('yn_outil') !== null;
				$report->yn_plan = $request->get('yn_plan') !== null;
				$report->yn_danger = $request->get('yn_danger') !== null;
				$report->yn_risk = $request->get('yn_risk') !== null;
				$report->yn_work_height = $request->get('yn_work_height') !== null;
				$report->yn_confined = $request->get('yn_confined') !== null;
				$report->yn_isolated = $request->get('yn_isolated') !== null;
				$report->yn_waste = $request->get('yn_waste') !== null;
				$report->comment_if_needed = $request->get('comment_if_needed');
			}
			$report->step = 0;
			$report->is_open = 0;
			$report->save();
			
			// $report->generatePDF();
		
			return redirect('/report/'.$report->id);
		}
		
		
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return redirect('/report/step-1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new Report();
		
		$report->customer_id = $request->input('customer_id');
		$report->machine_id = $request->input('machine_id');
		$report->intervention_type = $request->input('ndi1').'-'.$request->input('ndi2').'-'.$request->input('ndi3').'-'.$request->input('ndi4').'-'.$request->input('ndi5').'-'.$request->input('ndi6').'-'.$request->input('ndi7').'-'.$request->input('ndi8');
		$report->fluid_amount = $request->input('hcfc1').'-'.$request->input('hcfc2').'-'.$request->input('hcfc3');
		$report->leak_system = $request->input('sdf');
		$report->leak_observed = $request->input('fc');
		// $report->survey = $request->input('customer_id');
		$report->performance = $request->input('performance');
		$report->supplies = $request->input('supplies');
		$report->to_be_done = $request->input('to_be_done');

		$report->save();
		$report->number = "FF".date("Ymd").sprintf('%05d', $report->id);

		$report->save();	
		
		return redirect('/report');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
		if($report->is_open)
			return $this->step( new Request(), $report->step, $report );
		
		// return redirect('/report/step-'.$report->step.'/'.$report->id);
		// $customer = Customer::find($report->customer_id);
		// $machine = Machine::find($report->machine_id);
        return view( 'report.show', compact( 'report' ) );
    }
	
	public function validate_report(Report $report)
	{
		$report->is_validate = 1;
		$report->save();
		return redirect('/report/'.$report->id);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
	
	public function photo(Request $request)
	{
		$report = Report::find( $request->query('rid') );
		 return view( 'report.photo', compact( 'report' ) );
	}
	
	public function camera_add(Request $request)
	{
		if ( is_array( $request->file() ) ) {
			foreach( $request->file()['camera'] as $k=>$camera ){
				$file = $camera['picture'];
				$im = new Media();
				$id = $im->upload_img($file);
				// @TODO : can't pass the report directly ?
				// dd($request);
				$report = Report::find( $request->get('rid') );
				$report->medias()->attach( [$id => ['status' => $request['camera'][$k]['tag']]] );
				// $report->add_image( $id => ['status' => $request['camera'][$k]['tag']] );
				
				// $company->image_id = $id;
			}

		}
	}
	
	public function cri_view(Request $request)
	{
		$report = Report::find( $request->query('rid') );
		$cpy = Company::first();
		view()->share( 'report', $report );
		view()->share( 'cpy', $cpy );
		return view( 'report.cri', compact( 'report', 'cpy' ) );
		// dd($request);
        if( $request->has( 'download' ) ){
            $pdf = PDF::loadView( 'report.cri' );
            return $pdf->download( 'CRI-'.$report->number.'.pdf' );
        }
	}
	
	public function pdfview(Request $request)
    {
		
		$report = Report::find( $request->query('report') );
		
		$report->fill_bsd();
		return response()->download($report->number.".pdf");
		
		$cpy = Company::first();
		// dd($report->machine->fluids);
        // view()->share('report',$report);
        // if($request->has('download')){
            // $pdf = PDF::loadView('report.pdfview');
            // return $pdf->download('pdfview.pdf');
        // }
		
		$image = imagecreatefromjpeg("images/1528115827.jpg");

		// start buffering
		ob_start();
		imagepng($image);
		$contents = ob_get_clean();
		$img = '<img src="data:image/jpeg;base64,'.base64_encode( $contents ).'"/>';

		$txt[0] = "";
		$txt[1] = $cpy->name."\n".str_replace("\n", " ", $cpy->address)."\nSIRET : ".$cpy->siret;
		$txt[2] = $cpy->certificate;
		$txt[3] = $report->customer->name."\n".str_replace("\n", " ", $report->customer->address)."\n SIRET : ".$report->customer->siret;
		$txt[4] = $report->machine->brand.' '.$report->machine->model;
		$txt[5] = $report->machine->fluids[0]->name;
		$txt[6] = $report->machine->fluids[0]->pivot->load;
		$txt[7] = ""; // rempli plus bas
		$txt[8] = "";
		$txt[9] = "";
		$txt[10] = "";
		$txt[11] = "";
		$txt[12] = "";
		$txt[13] = "";
		$chk[0] = "1";
		$chk[1] = '1';
		$chk[2] = 1;
		$chk[3] = 'Off';
		$chk[4] = "Off";
		$chk[5] = "x";
		$chk[6] = "v";
		$chk[7] = 1;
		
		$rdo[0] = ($report->machine->leak_detector)? 1:2;
		if($report->machine->fluids[0]->pivot->load < 30)
			$rdo[1] = 1;
		else if($report->machine->fluids[0]->pivot->load >= 300)
			$rdo[1] = 3;
		else
			$rdo[1] = 2;
		// $eqt = $report->machine->fluids[0]->gwp / 1000 * $report->machine->fluids[0]->pivot->load;
		$eqt = $report->teqco2();
		$txt[7] = $eqt;
		if($eqt < 50)
			$rdo[2] = 1;
		else if($eqt >= 500)
			$rdo[2] = 3;
		else
			$rdo[2] = 2;

		
		if($report->machine->leak_detector){	
			$rdo[3] = 0;
			$rdo[4] = $rdo[1];
		}else{
			$rdo[4] = 0;
			$rdo[3] = $rdo[1];
			
		}
		$rdo[5] = 1;
		
		$txt[14] = $report->fc1;
		$txt[15] = $report->fc2;
		$txt[16] = $report->fc3;
		
		$rdo[6] = ( $report->fcr1 == null) ? "Off" : $report->fcr1;
		$rdo[7] = ( $report->fcr2 == null) ? "Off" : $report->fcr2;
		$rdo[8] = ( $report->fcr3 == null) ? "Off" : $report->fcr3;
		
		$txt[17] = $report->qty_loaded();
		$txt[18] = $report->fluide_vierge;
		$txt[19] = $report->fluide_recycle;
		$txt[20] = $report->fluide_regenere;
		$txt[21] = $report->qty_recovered();
		$txt[22] = $report->fluide_traitement;
		$txt[23] = $report->fluide_conserve;
		$txt[24] = $report->contenant;
		
		
		// dd($rdo);
		
		$fdf = '%FDF-1.2
1 0 obj<</FDF<< /Fields[
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[0])/V('.$txt[0].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[1])/V('.$txt[1].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[2])/V('.$txt[2].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[3])/V('.$txt[3].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[4])/V('.$txt[4].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[5])/V('.$txt[5].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[6])/V('.$txt[6].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[7])/V('.$txt[7].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[8])/V('.$txt[8].')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[0] .')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[1].')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[2].')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[3].')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[4].')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[5].')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[6].')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[7].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[9])/V('.$txt[9].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[10])/V('.$txt[10].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[11])/V('.$txt[11].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[12])/V('.$txt[12].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[13])/V('.$txt[13].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[0])/V('.$rdo[0].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[1])/V('.$rdo[1].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[2])/V('.$rdo[2].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[3])/V('.$rdo[3].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[4])/V('.$rdo[4].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[5])/V('.$rdo[5].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[14])/V('.$txt[14].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[15])/V('.$txt[15].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[16])/V('.$txt[16].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[6])/V('.$rdo[6].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[7])/V('.$rdo[7].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[8])/V('.$rdo[8].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[17])/V('.$txt[17].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[18])/V('.$txt[18].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[19])/V('.$txt[19].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[20])/V('.$txt[20].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[21])/V('.$txt[21].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[22])/V('.$txt[22].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[23])/V('.$txt[23].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[24])/V('.$txt[24].')>>
] >> >>
endobj
trailer
<</Root 1 0 R>>
%%EOF';
 
	file_put_contents('test.fdf', $fdf);

	exec("pdftk cerfa_15497-02.pdf fill_form test.fdf output filled.pdf flatten");
	
	return response()->download("filled.pdf");
        // return view('report.index');
    }
	
	public function pdffields(){
		exec("pdftk cerfa_15497-02.pdf dump_data_fields > fields.txt");
	}
}
