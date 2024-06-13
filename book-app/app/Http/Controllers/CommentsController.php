<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $comment = $book->comments()->create([
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('books.show', $book->id);
    }

    public function destroy(Book $book, Comment $comment)
    {
        $comment->delete();
        return redirect()->route('books.show', $book->id);
    }
}
