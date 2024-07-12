<?php

namespace App\Http\Controllers;

use App\Models\love_story;
use Illuminate\Http\Request;

class LoveStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/admin/love_story/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'story' => 'required|string|max:255',
            'date' => 'required|string|max:255',
        ]);


        love_story::create([
            'story' => $request->story,
            'agenda_date' => $request->agenda_date,
        ]);

        return redirect()->route('love-story.index')->with(['success' => 'Add Data Success!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(love_story $love_story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(love_story $love_story)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, love_story $love_story)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(love_story $love_story)
    {
        //
    }
}
