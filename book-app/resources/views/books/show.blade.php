@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p>{{ $book->description }}</p>
    <p>by {{ $book->user->name }}</p>

    <h2>Chapters</h2>
    <ul>
        @foreach ($chapters as $chapter)
            <li>
                <h3>{{ $chapter->title }}</h3>
                <p>{{ $chapter->content }}</p>
                <a href="{{ route('chapters.edit', [$book->id, $chapter->id]) }}">Edit</a>
                <form action="{{ route('chapters.destroy', [$book->id, $chapter->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
        <li><a href="{{ route('chapters.create', $book->id) }}">Add a new chapter</a></li>
    </ul>

    <h2>Comments</h2>
    <ul>
        @foreach ($comments as $comment)
            <li>
                <p>{{ $comment->content }}</p>
                <p>by {{ $comment->user->name }}</p>
                <form action="{{ route('comments.destroy', [$book->id, $comment->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
        <li>
            <form action="{{ route('comments.store', $book->id) }}" method="POST">
                @csrf
                <textarea name="content" placeholder="Add a comment"></textarea>
                <button type="submit">Submit</button>
            </form>
        </li>
    </ul>
@endsection