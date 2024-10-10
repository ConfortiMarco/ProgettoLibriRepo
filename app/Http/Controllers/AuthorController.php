<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $authors = Author::all();
        return view('list_author',['authors'=>$authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('create_author');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AuthorRequest $request)
    {
        $request->validated();
        $author = new Author();
        $author->name = $request->input('name');
        $author->birthday = $request->input('birthday');
        $author->save();
        return redirect()->back()->with('success', 'Dati inviati con successo!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $author = Author::find($id);
        return view('edit_author',['author'=>$author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AuthorRequest $request, $id)
    {
        $request->validated();
        Author::find($id)->update(['name' => $request->input('name'),'birthday' => $request->input('birthday')]);
        return redirect()->back()->with('success', 'Aggiornamento effettuato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Author::destroy($id);
        return redirect()->back()->with('success', 'Eliminazione effettuata con successo!');
    }
}
