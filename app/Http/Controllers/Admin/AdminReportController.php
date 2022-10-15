<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookReports;
use App\Models\Report;
use App\Models\ReviewReport;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public $bookReports;
    public $reviewReports;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
        $this->bookReports = BookReports::with('book', 'user', 'report')->get()->sortBy(function ($report) {
            return $report->book->id;
        })->paginate(10);
        $this->reviewReports = ReviewReport::with('review', 'user', 'report')->get()->sortBy(function ($report) {
            return $report->review->id;
        })->paginate(10);
    }
    public function index()
    {
        $bookReports = $this->bookReports;
        $reviewReports = $this->reviewReports;
        return view('Admin.Report.index', compact(['bookReports', 'reviewReports']));
    }
    public function bookReports()
    {
        $bookReports = $this->bookReports;
        return view('Admin.parts.reports.bookreportstable', compact(['bookReports']));
    }
    public function reviewReports()
    {
        $reviewReports = $this->reviewReports;
        return view('Admin.parts.reports.reviewreportstable', compact(['reviewReports']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = Report::create([
            'reason' => $request->reason,
            'explain' => $request->explain
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->report_type == 'book') {
            $report = BookReports::find($id);
        } else {
            $report = ReviewReport::find($id);
        }
        $report->seen = 1;
        $report->action = 'ignore';
        $report->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}