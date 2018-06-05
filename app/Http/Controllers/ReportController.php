<?php

namespace App\Http\Controllers;

use DB;
use PDF;

use App\Report;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$customers = Customer::pluck('name', 'id');
		$machines = Machine::all();
        return view( 'report.create', compact( 'customers', 'machines' ) );
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
		
        // $items = DB::table("reports")->get();
		// $customer = Customer::find($report->customer_id);
		// $address = $customer->get_address();
		// $machine = Machine::find($report->machine_id);
        view()->share('report',$report);
		// view()->share('customer',$customer);
		// view()->share('address',$address);
		// view()->share('machine',$machine);


        if($request->has('download')){
            $pdf = PDF::loadView('report.pdfview');
            return $pdf->download('pdfview.pdf');
        }


        return view('report.index');
    }
}
