<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class AddNoteController extends Controller
{
    public function add(Request $request) {
        $valid = $request->validate([
            'title' => 'required|max:20',
            'text' => 'required|max:255'
        ]);

        $add = new Note();
        $add->title = $request->input('title');
        $add->text = $request->input('text');

        $add->save();

        return redirect(route('notes'));
    }
}
