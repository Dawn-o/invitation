<?php

namespace App\Http\Controllers;

use App\Models\Love_story;
use Illuminate\Http\Request;

class LoveStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($identity)
    {
        $love_stories = Love_story::all()->where('identity_id', $identity);

        return view('admin.love_story.list', compact('love_stories', 'identity'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($identity)
    {
        return view('/admin/love_story/create', compact('identity'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $identity)
    {
        $request->validate([
            'story' => 'required|string|max:255',
            'date' => 'required|string|max:255',
        ]);


        Love_story::create([
            'identity_id' => $identity,
            'story' => $request->story,
            'date' => $request->date,
        ]);

        return redirect()->route('love_story.index', $identity)->with(['success' => 'Added Data Success!']);
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
    public function edit($identity, $love_story)
    {
        $love_story = Love_story::Where('id', $love_story)->first();
        return view('/admin/love_story/edit', compact('love_story', 'identity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $identity, $love_story)
    {
        $request->validate([
            'story' => 'required|string|max:255',
            'date' => 'required|string|max:255',
        ]);

        $love_story = Love_story::where('id', $love_story)->first();

        $love_story->update([
            'identity_id' => $identity,
            'story' => $request->story,
            'date' => $request->date,
        ]);

        return redirect()->route('love_story.index', $identity)->with(['success' => 'Updated Data Success!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($identity, $love_story)
    {
        $love_story = Love_story::where('id', $love_story)->first();

        $love_story->delete();

        return redirect()->route('love_story.index', $identity)->with(['success' => 'Deleted Data Success!']);

    }
}
