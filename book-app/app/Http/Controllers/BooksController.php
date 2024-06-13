<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::with('user')->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $book = auth()->user()->books()->create($request->all());
        return redirect()->route('books.show', $book->id);
    }

    public function show(Book $book)
    {
        $chapters = $book->chapters;
        $comments = $book->comments()->with('user')->get();
        return view('books.show', compact('book', 'chapters', 'comments'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('books.show', $book->id);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
