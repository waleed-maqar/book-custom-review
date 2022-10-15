<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\DealWithReportsTrait;
use App\Models\Book;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    public $books;
    public $trashedBooks;
    use DealWithReportsTrait;
    public function __construct(Request $request)
    {
        $this->middleware('admin');
        if ($request->hasAny(['delete', 'ignore'])) {
            $this->middleware('admin:supervisor');
        }
        $this->books = Book::with('reports')->get()->sortByDesc(function ($record) {
            return count($record->reports);
        })->paginate(10);
        $this->trashedBooks = Book::onlyTrashed()->with('reports')->get()->sortByDesc(function ($record) {
            return count($record->reports);
        })->paginate(10);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->books;
        $trashedBooks = $this->trashedBooks;
        return view('Admin.Book.index', compact(['books', 'trashedBooks']));
    }
    public function activeBooks()
    {
        $books = $this->books;
        return view('Admin.parts.books.booksindexactivetable', compact(['books',]));
    }
    public function trashedBooks()
    {
        $trashedBooks = $this->trashedBooks;
        return view('Admin.parts.books.booksindextrashedtable', compact(['trashedBooks']));
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
        $book = Book::withTrashed()->with('reports')->findOrFail($id);
        return view('Admin.Book.show', compact(['book']));
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
        $book = Book::withTrashed()->findOrFail($id);
        if ($request->has('delete')) {
            $this->bookReportsAction($id, 'delete');
            $book->forceDelete();
            return redirect(route('dashboard.book.index'));
        } elseif ($request->has('suspend')) {
            $this->bookReportsAction($id, 'suspend');
            $book->delete();
        } else {
            $book->restore();
        }
        return back();
    }
}