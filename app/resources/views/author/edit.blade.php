<x-layout>
    <form method="POST" action="{{ route('author.update', ['author' => $author->id]) }}">
        <div class="mb-3">
            <label for="authorName" class="form-label">Name:</label>
            <input type="text" class="form-control" id="authorName" aria-describedby="nameHelp"
                   name="name" value="{{ old('name', $author->name) }}">
            <div id="nameHelp" class="form-text">Name of the author</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <input type="hidden" name="id" value="{{ $author->id }}">
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
    <a href="{{ route('author.list') }}">
        <button type="button" class="btn btn-link">Back</button>
    </a>
</x-layout>
