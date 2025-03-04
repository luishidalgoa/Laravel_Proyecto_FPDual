<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Support\Facades\Validator;

class NoteApiController extends Controller
{
    /**
     * Display a listing of the notes.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $notes = Note::all();
        return response()->json($notes);
    }

    /**
     * Store a newly created note in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'notes' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $note = Note::create($request->all());
        return response()->json($note, 201);
    }

    /**
     * Display the specified note.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $note = Note::find($id);

        if (is_null($note)) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        return response()->json($note);
    }

    /**
     * Update the specified note in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'notes' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $note = Note::find($id);

        if (is_null($note)) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        $note->update($request->all());
        return response()->json($note);
    }

    /**
     * Remove the specified note from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $note = Note::find($id);

        if (is_null($note)) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        $note->delete();
        return response()->json(['message' => 'Note deleted successfully']);
    }
}