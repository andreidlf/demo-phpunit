<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Author;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testItPassesValidation(): void
    {
        /** @var Author $author */
        $author = Author::factory()->create();

        $data = [
            'name' => 'Some book name',
            'author_id' => $author->id
        ];

        $response = $this->post(route('book.store'), $data);

        $response->assertStatus(Response::HTTP_CREATED);
    }
}
