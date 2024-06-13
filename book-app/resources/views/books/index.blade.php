@extends('layouts.app')

@section('content')
    <h1>All Books</h1>
    <ul>
        @foreach ($books as $book)
            <li>
                <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a>
                by {{ $book->user->name }}
            </li>
        @endforeach
    </ul>
    <a href="{{ route('books.create') }}">Create a new book</a>
@endsection