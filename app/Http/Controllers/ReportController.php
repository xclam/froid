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
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();
		return view( 'report.index', compact( 'reports' ) );
    }

	public function step( $step = null, Request $request )
	{
		
		if( $step == 1 ){
			$customers = Customer::pluck('name', 'id');
			$machines = Machine::all();
			$sites = Site::all();
			$next = "step-2";
			return view( 'report.create', compact( 'customers', 'machines', 'sites', 'step' , 'next') );
		}
		
		$report = new Report();
		$user = Auth::user();
		
		if( $step == 2 ){
			$report->customer_id = $request->input('customer_id');
			$report->machine_id = $request->input('machine_id');
			$report->site_id = $request->input('site_id');
			$report->intervention_date = $request->input('intervention_date');
			$report->save();
			$report->number = "FF".date("Ymd").sprintf('%05d', $report->id);
			$report->save();
			// dd($report);
			$next = "step-3";
			return view( 'report.create', compact( 'report' , 'step' , 'next') );
		}
		
		if( $step == 3 ){
			$report = Report::find( $request->get('id') );
			$report->intervention_type = implode( '-', $request->get('ndi') );
			$report->save();
			$next = "step-4";
			return view( 'report.create', compact( 'report', 'step' , 'next') );
		}
		
		if( $step == 4 ){
			$report = Report::find( $request->get('id') );
			$report->fluid_amount = $request->get('qdf');
			$report->leak_system = $request->get('sdf');
			$report->leak_observed = $request->get('fc');
			$report->save();
			$next = "step-5";
			return view( 'report.create', compact( 'report', 'step' , 'next') );
		}
		
		if( $step == 5 ){
			$report = Report::find( $request->get('id') );
			$report->performance = $request->get('performance');
			$report->supplies = $request->get('supplies');
			$report->to_be_done = $request->get('to_be_done');
			$report->save();
			
			$report->generatePDF();
		
			return redirect('/report');
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
		$report->generatePDF();
		
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
		// $customer = Customer::find($report->customer_id);
		// $machine = Machine::find($report->machine_id);
        return view( 'report.show', compact( 'report' ) );
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
	
	public function pdfview(Request $request)
    {
		$report = Report::find( $request->query('report') );
		$cpy = Company::first();
		// dd($report->machine->fluids);
        // view()->share('report',$report);
        // if($request->has('download')){
            // $pdf = PDF::loadView('report.pdfview');
            // return $pdf->download('pdfview.pdf');
        // }
		$txt[0] = "";
		$txt[1] = $cpy->name."\n".str_replace("\n", " ", $cpy->address)."\nSIRET : ".$cpy->siret;
		$txt[2] = $cpy->certificate;
		$txt[3] = $report->customer->name."\n".str_replace("\n", " ", $report->customer->address)."\n SIRET : ".$report->customer->siret;
		$txt[4] = $report->machine->brand.' '.$report->machine->model;
		$txt[5] = $report->machine->fluids[0]->name;
		$txt[6] = $report->machine->fluids[0]->pivot->load;
		$txt[7] = $report->machine->fluids[0]; // rempli plus bas
		$txt[8] = "efcsfsdfsdfsdfsdfds";
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
		$eqt = $report->machine->fluids[0]->gwp / 1000 * $report->machine->fluids[0]->pivot->load;
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
] >> >>
endobj
trailer
<</Root 1 0 R>>
%%EOF';

	file_put_contents('test.fdf', $fdf);

	exec("pdftk cerfa_15497-02.pdf fill_form test.fdf output filled.pdf flatten");
        // return view('report.index');
    }
	
	public function pdffields(){
		exec("pdftk cerfa_15497-02.pdf dump_data_fields > fields.txt");
	}
}
