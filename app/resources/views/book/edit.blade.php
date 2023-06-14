<x-layout>
    <form method="POST" action="{{ route('book.update', ['book' => $book->id]) }}">
        <div class="mb-3">
            <label for="bookName" class="form-label">Title:</label>
            <input type="text" class="form-control" id="bookName" aria-describedby="nameHelp"
                   name="title" value="{{ old('title', $book->title) }}">
            <div id="nameHelp" class="form-text">Title of the book</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <input type="hidden" name="id" value="{{ $book->id }}">
        @csrf
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br/>
    <a href="{{ route('book.list', ['author' => $book->author_id]) }}">
        <button type="button" class="btn btn-link">Back</button>
    </a>
</x-layout>
