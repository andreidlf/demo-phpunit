<?php

namespace Tests\Integration\Services;

use App\Models\Author;
use App\Services\BookService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BookServiceTest extends TestCase
{
    use DatabaseMigrations;

    private Author|Model $author;
    private BookService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->author = Author::factory()->create();
        $this->service = new BookService();
    }

    public function testItCreatesABook(): void
    {
        $book = $this->service->create(['title' => 'PHPUnit', 'author_id' => $this->author->id]);

        $this->assertDatabaseHas($book->getTable(), ['title' => 'PHPUnit']);
    }
}
