<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Author $author): View
    {
        return view('book.list', ['books' => Book::where('author_id', $author->id)->get(), 'author' => $author]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Author $author): View
    {
        return view('book.create', ['author' => $author]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $book = new Book();
        $book->title = $validated['title'];
        $book->author_id = $validated['author_id'];
        $book->save();

        return redirect(route('book.list', ['author' => $validated['author_id']]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book): View
    {
        return view('book.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBookRequest $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book): RedirectResponse
    {
        $validated = $request->validated();

        $book->title = $validated['title'];
        $book->save();

        return redirect(route('book.list', ['author' => $book->author_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect(route('book.list', ['author'=> $book->author_id]));
    }
}
