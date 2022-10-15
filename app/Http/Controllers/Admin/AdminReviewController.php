<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\DealWithReportsTrait;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    use DealWithReportsTrait;
    public $reviews;
    public $trashedReviews;
    public function __construct(Request $request)
    {
        $this->middleware('admin');
        if ($request->hasAny(['delete', 'ignore'])) {
            $this->middleware('admin:supervisor');
        }
        $this->reviews = Review::with('book')->get()->sortByDesc(function ($review) {
            return count($review->reports);
        })->paginate(10);
        $this->trashedReviews = Review::onlyTrashed()->with('book')->get()->sortByDesc(function ($review) {
            return count($review->reports);
        })->paginate(10);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = $this->reviews;
        $trashedReviews = $this->trashedReviews;
        return view('Admin.Review.index', compact(['reviews', 'trashedReviews']));
    }
    public function activeReviews()
    {
        $reviews = $this->reviews;
        return view('Admin.parts.reviews.reviewsindexactivetable', compact(['reviews']));
    }
    public function trashedReviews()
    {
        $trashedReviews = $this->trashedReviews;
        return view('Admin.parts.reviews.reviewsindextrashedtable', compact(['trashedReviews']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::with('reports', 'book')->withTrashed()->findOrFail($id);
        return view('Admin.Review.show', compact(['review']));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $review = Review::withTrashed()->findOrFail($id);
        if ($request->has('delete')) {
            $this->reviewReportsAction($id, 'delete');
            $review->forceDelete();
            return redirect(route('dashboard.review.index'));
        } elseif ($request->has('suspend')) {
            $this->reviewReportsAction($id, 'suspend');
            $review->delete();
        } else {
            $review->restore();
        }
        return back();
    }
}