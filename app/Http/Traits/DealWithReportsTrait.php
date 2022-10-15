<?php

namespace App\Http\Traits;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;

trait DealWithReportsTrait
{
    public $reports;
    public function dealWithReports($action)
    {
        foreach ($this->reports as $report) {
            $report->seen = 1;
            if ($report->action != 'delete') {
                $report->action = $action;
            }
            $report->save();
        }
    }
    public function bookReportsAction($book_id, $action)
    {
        $book = Book::withTrashed()->with('reports')->findOrFail($book_id);
        if ($book) {
            $this->reports = $book->reports;
            $this->dealWithReports($action);
        }
        return true;
    }
    public function reviewReportsAction($review_id, $action)
    {
        $review = Review::withTrashed()->with('reports')->findOrFail($review_id);
        if ($review) {
            $this->reports = $review->reports;
            $this->dealWithReports($action);
        }
        return true;
    }
    public function userReportsAction($user_id, $action)
    {
        $user = User::withTrashed()->findOrFail($user_id);
        if ($user) {
            $this->reports = $user->reports();
            $this->dealWithReports($action);
        }
        return true;
    }
}