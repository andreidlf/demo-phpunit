<?php

declare(strict_types=1);

namespace Tests\Integration\Models;

use App\Models\Author;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    use DatabaseMigrations;

    public function testItCanCreateDatabaseModelsViaFactory()
    {
        Author::factory()->create();

        $this->assertDatabaseCount((new Author())->getTable(), 1);
    }

    public function testItCreatesEntryViaModel()
    {
        $author = new Author();
        $author->name = 'PHPUnit';
        $author->save();

        $this->assertDatabaseCount($author->getTable(), 1);
    }
}
