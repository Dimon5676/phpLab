<?php

namespace App\Http\Controllers;

use App\Models\Note;

class NotesController extends Controller
{
    public function notes() {
        $notes = new Note();
        return view("notes", ['notes' => $notes->all()]);
    }

    public function delete($id) {
        Note::find($id)->delete();

        return redirect(route('notes'));
    }
}
