<?php

declare(strict_types=1);

namespace Tests\Integration\Models;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BookTest extends TestCase
{
    use DatabaseMigrations;

    public function testItCanCreateDatabaseModelsViaFactory()
    {
        Book::factory()->for(Author::factory())->create();

        $this->assertDatabaseCount((new Book())->getTable(), 1);
    }

    public function testItCreatesEntryViaModel()
    {
        /** @var Author $author */
        $author = Author::factory()->create();

        $book = new Book();
        $book->title = 'PHPUnit';
        $book->author_id = $author->id;
        $book->save();

        $this->assertDatabaseCount($book->getTable(), 1);
    }
}
