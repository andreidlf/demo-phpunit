<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    public function create(array $data): Book
    {
        $book = new Book();
        $book->title = $data['title'];
        $book->author_id = $data['author_id'];
        $book->save();

        return $book;
    }

    public function update(Book $book, array $data): bool
    {
        $book->title = $data['title'];

        return $book->save();
    }
}
