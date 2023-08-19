<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $notes = $user->notes()->orderBy('updated_at', 'desc')->get();
        return view('dashboard', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'note' => 'required',
        ]);

        $user = Auth::user();
        $note = new Note([
            'title' => $request->input('title'),
            'note' => $request->input('note'),
        ]);
        $user->notes()->save($note);

        return redirect()->route('dashboard')->with('success', 'Note has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::findOrFail($id);
        return view('notes.update', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $noteObj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $noteObj)
    {
        $request->validate([
            'title' => 'required',
            'note' => 'required',
        ]);

        $noteObj->fill($request->post())->save();
        return redirect()->route('dashboard')->with('success', 'Note Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('dashboard')->with('success', 'Note has been deleted successfully');
    }
}
