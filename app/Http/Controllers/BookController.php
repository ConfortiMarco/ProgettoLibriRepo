<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $books = Book::all();
        $authors = array();
        $categories = array();
        foreach ($books as $book) {

            $aut = $book->author()->first();
            $cat = $book->category()->first();
            $authors[$book['id']] = $aut['name'];
            $categories[$book['id']] = $cat['name'];
        }
        return view('index', ['books' => $books, 'authors' => $authors, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('create_book', ['authors' => $authors, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookRequest $request)
    {
        $request->validated();
        $file = $request->file('cover');
        $name = "";
        if ($file != null) {
            if ($file->isValid()) {
                $width = 400;
                $height = 520;
                $random = Str::random(10);
                $name = time() . $random . '.' . $file->getClientOriginalExtension();
                $img = Image::make($file->getRealPath());
                $img->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $path = $img->save(public_path('images/img/') . $name);
            }
        }

        $book = new Book();
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->pages = $request->input('pages');
        $book->author_id = $request->input('author');
        $book->category_id = $request->input('category');
        $book->cover = $name;
        $book->save();

        return redirect()->back()->with('success', 'Dati inviati con successo!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $id
     * @return
     */
    function show($id)
    {
        $book = Book::find($id);
        $auth = $book->author()->first();
        $cate = $book->category()->first();
        return view('detail_book', ['book' => $book, 'auth' => $auth, 'cate' => $cate]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $auth = $book->author()->first();
        $cate = $book->category()->first();
        $authors = Author::all();
        $categories = Category::all();
        return view('edit_book', ['book' => $book, 'authors' => $authors, 'categories' => $categories, 'auth' => $auth, 'cate' => $cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BookRequest $request, $id)
    {
        $request->validated();

        $file = $request->file('cover');
        $name = "";
        if ($file != null) {
            if ($file->isValid()) {
                $width = 400;
                $height = 520;
                $random = Str::random(10);
                $name = time() . $random . '.' . $file->getClientOriginalExtension();
                $img = Image::make($file->getRealPath());
                $img->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $path = $img->save(public_path('images/img/') . $name);
            }
        }

        Book::find($id)->update(['title' => $request->input('title'), 'description' => $request->input('description'), 'pages' => $request->input('pages'), 'cover' => $name,'author_id' => $request->input('author'), 'category_id' => $request->input('category')]);
        return redirect()->back()->with('success', 'Dati aggiornati con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->back()->with('success', 'Dati eliminati con successo!');
    }
}
