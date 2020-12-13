<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function search(Request $request) {
        $note = new Note();
        $note = DB::table('notes')->where('title', 'LIKE', '%' . $request->title . '%')->get();
        return view('notes', ['notes' => $note]);
    }
}
