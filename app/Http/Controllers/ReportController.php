<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\HistoryCashCard;
use App\ReportVisitor;
use Session;

class ReportController extends Controller
{
    public function getReportVisit() {
        Session::put('active_menu', 'report');
        $storys = new Story;
        $storys = $storys::orderBy('visit', 'desc')->get();
        return view('admin.report.visit')->with('storys', $storys);
    }

    public function getReportTopup() {
        $history_cashcard = new HistoryCashCard;
        $history_cashcard = $history_cashcard::where('response_code', '0')->get();
        return view('admin.report.topup')->with('history_cashcard', $history_cashcard);
    }

    public function getReportPeople(Request $request) {
        Session::put('active_menu', 'report');
        $report_visits = new ReportVisitor;
        $report_visits = $report_visits::all();
        return view('admin.report.ip_address')->with('report_visits', $report_visits);
    }
}
