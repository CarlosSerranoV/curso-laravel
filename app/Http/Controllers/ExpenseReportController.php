<?php

namespace App\Http\Controllers;

use App\Mail\SummaryReport;
use Illuminate\Http\Request;
use App\models\ExpenseReport;
use Illuminate\Support\Facades\Mail;


class ExpenseReportController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return ExpenseReport::all();     regresa todo la informacion de ka tabla expense a travez del modelo explserepor

        return view('expenseReport.index', ['expenseReports' => ExpenseReport::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validaData= $request->validate([
           'title'=>'required | min:3'
        ]);
        $report = new ExpenseReport();
        $report->title = $request->get('title');
        $report->save();

        return redirect('/expense_reports');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseReport $expenseReport)
    {
        //recibimos un report, laravel busca a travez del id findOrFail
    return view('expenseReport.show', [
       'report' => $expenseReport
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.edit', ['report' => $report]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report = ExpenseReport::find($id);
        $report->title = $request->get('title');
        $report->save();

        return redirect('/expense_reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::find($id);
        $report->delete();

        return redirect('/expense_reports');
    }

    public function confirmDelete($id){
        $report = ExpenseReport::find($id);

        return view('expenseReport.confirmDelete', ['report'=>$report]);
    }

    public function confirmSendEmail($id){
        $report = ExpenseReport::find($id);
        return view('expenseReport.confirmSendEmail', ['report'=>$report]);
    }

    public function sendEmail(Request $request,$id){
        $report = ExpenseReport::find($id);
        Mail::to($request->get('email'))->send(new SummaryReport($report));
        return redirect('/expense_reports/'.$id);
    }
}
