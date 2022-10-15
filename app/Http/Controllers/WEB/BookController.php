<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\BookRequest;
use App\Http\Requests\Web\BookUpdateRequest;
use App\Http\Traits\AddDetailsTrait;
use App\Http\Traits\ImageUploadTrait;
use App\Http\Traits\PermisionsTrait;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BookScales;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    use ImageUploadTrait, AddDetailsTrait, PermisionsTrait;
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(12);
        return view('Web.Book.index', compact(['books']));
    }
    public function search(Request $request)
    {
        $request->validate([
            'key' => 'required'
        ]);
        $books = Book::paginate(12);
        $key = $request->key;
        if ($key) {
            $books = Book::with('author')->where('title', 'like', '%' . $key . '%')
                ->orWhere('about', 'like', '%' . $key . '%')
                ->orWhereHas('author', function ($query) use ($key) {
                    return $query->where('name', 'like', '%' . $key . '%');
                })
                ->paginate(12);
        }
        return view('Web.Book.search', compact(['books', 'key']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::get();
        $categories = Category::with('subCats')->get();
        return view('Web.Book.Create', compact(['authors', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        // dd($request->all());
        $book = $request->book;
        if ($request->hasFile('book')) {
            $book['image'] = $this->uploadphoto('book.image', 'books', 'book.title');
        }
        $book['user_id'] = Auth::id();
        $categories = $request->categories;
        $scales = $request->scales;
        $newBook = Book::create($book);
        $this->addScales($scales, $newBook->id);
        $this->addCategories($categories, $newBook->id);
        return redirect(route('book.show', $newBook->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::with(['user', 'scales', 'categories', 'reviews', 'author'])->findOrFail($id);
        $reviews = $book->reviews->sortByDesc('rating');
        return view('Web.Book.Show', compact(['book', 'reviews']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        // if (!$this->owner($book->user_id)) {
        //     return   $this->OwnerRedierect($book->user_id, 'Not allowed to edit This book');
        // }
        if (!Gate::allows('update', $book->user_id)) {
            abort(403);
        }
        $authors = Author::get();
        $categories = Category::get();
        return view('Web.Book.edit', compact(['book', 'authors', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, $id)
    {
        // dd($request->all());
        $book = Book::with('categories')->find($id);
        $bookData = $request->book;
        $categories = $request->categories;
        if ($request->hasFile('book')) {
            $bookData['image'] = $this->uploadphoto('book.image', 'books', 'book.title');
        } else {
            $bookData['image'] = $book->image;
        }
        $book->update($bookData);
        if ($categories) {
            foreach ($book->categories as $cat) {
                $cat->delete();
            }
            $this->addCategories($categories, $id);
        }
        return redirect(route('book.show', $id));
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