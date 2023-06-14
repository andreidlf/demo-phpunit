<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('author.list', ['authors' => Author::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAuthorRequest $request
     */
    public function store(StoreAuthorRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $author = new Author();
        $author->name = $validated['name'];
        $author->save();

        return redirect(route('author.list'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author): View
    {
        return view('author.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author): RedirectResponse
    {
        $validated = $request->validated();

        $author->name = $validated['name'];
        $author->save();

        return redirect(route('author.edit', ['author' => $author->id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author): RedirectResponse
    {
        $author->book()->each(fn(Book $book) => $book->delete());

        $author->delete();

        return redirect(route('author.list'));
    }
}
