<x-layout>
    <div>
        <a href="{{ route('book.create', ['author' => $author->id]) }}">
            <button type="button" class="btn btn-primary">Add</button>
        </a>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <th scope="row">{{ $book->id  }}</th>
                    <td>{{ $book->title }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Options">
                            <a href="{{ route('book.edit', ['book' => $book->id]) }}" class="btn btn-success">
                                Edit
                            </a>
                            <a href="{{ route('book.delete', ['book' => $book->id]) }}" class="btn btn-danger">
                                Delete
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br/>
    <a href="{{ route('author.list') }}">
        <button type="button" class="btn btn-link">Back</button>
    </a>
</x-layout>
