<x-layout>
    <form method="POST" action="{{ route('book.store') }}">
        <div class="mb-3">
            <label for="bookName" class="form-label">Title:</label>
            <input type="text" class="form-control" id="bookName" aria-describedby="nameHelp"
                   name="title" value="{{ old('title') }}">
            <div id="titleHelp" class="form-text">Title of the book</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <input type="hidden" name="author_id" value="{{ $author->id }}">
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
    <a href="{{ route('book.list', ['author' => $author->id]) }}">
        <button type="button" class="btn btn-link">Back</button>
    </a>
</x-layout>
