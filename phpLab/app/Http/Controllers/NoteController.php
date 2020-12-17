<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function note($id) {
        $note = Note::find($id);
        $comments = Comment::all()->where("note_id", $id);
        if (count($comments) == 0) {
            $comments = null;
        }

        if ($note == null) {
            return redirect(route("notes"));
        } else {
            return view('note', ["note" => $note, "comments" => $comments]);
        }
    }

    public function addComment(Request $request) {
        $comment = new Comment();
        $string = trim($request->input('text'));
        if (strlen($string) == 0 || strlen($string) > 255) return redirect(route('note', $request->input('note_id')));
        $comment->text = $string;
        $comment->author = $request->input('author');
        $comment->note_id = $request->input('note_id');

        $comment->save();

        return redirect(route('note', $comment->note_id));
    }
}
