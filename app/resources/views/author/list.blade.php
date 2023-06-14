<x-layout>
    <div>
        <a href="{{ route('author.create') }}">
            <button type="button" class="btn btn-primary">Add</button>
        </a>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <th scope="row">{{ $author->id  }}</th>
                    <td>{{ $author->name }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Options">
                            <a href="{{ route('book.create', ['author' => $author->id]) }}" class="btn btn-secondary">
                                Add book
                            </a>
                            <a href="{{ route('book.list', ['author' => $author->id]) }}" class="btn btn-info">
                                Show books
                            </a>
                            <a href="{{ route('author.edit', ['author' => $author->id]) }}" class="btn btn-success">
                                Edit
                            </a>
                            <a href="{{ route('author.delete', ['author' => $author->id]) }}" class="btn btn-danger">
                                Delete
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
