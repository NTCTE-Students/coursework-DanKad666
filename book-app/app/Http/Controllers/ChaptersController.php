<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChaptersController extends Controller
{
    public function create(Book $book)
    {
        return view('chapters.create', compact('book'));
    }

    public function store(Request $request, Book $book)
    {
        $book->chapters()->create($request->all());
        return redirect()->route('books.show', $book->id);
    }

    public function edit(Book $book, Chapter $chapter)
    {
        return view('chapters.edit', compact('book', 'chapter'));
    }

    public function update(Request $request, Book $book, Chapter $chapter)
    {
        $chapter->update($request->all());
        return redirect()->route('books.show', $book->id);
    }

    public function destroy(Book $book, Chapter $chapter)
    {
        $chapter->delete();
        return redirect()->route('books.show', $book->id);
    }
}
