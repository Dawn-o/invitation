<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($identity)
    {
        $galleries = Gallery::all()->where('identity_id', $identity);
        return view('/admin/gallery/list', compact('galleries', 'identity'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($identity)
    {
        return view('/admin/gallery/create', compact('identity'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $identity)
    {
        $request->validate([
            'photo' => 'required',
            'photo.*' => 'image|mimes:jpeg,jpg,png,webp|max:5120',
            'description' => 'required|string|max:255',
        ]);


        foreach ($request->file('photo') as $image) {
            $image->storeAs('public/galleries', $image->hashName());
            Gallery::create([
                'identity_id' => $identity,
                'photo' => $image->hashName(),
                'description' => $request->description,
            ]);
        }

        return redirect()->route('gallery.index', $identity)->with(['success' => 'Added Images Success!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($identity, $gallery)
    {
        $gallery = Gallery::where('id', $gallery)->first();
        return view('/admin/gallery/edit', compact('gallery', 'identity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $identity, $gallery)
    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,jpg,png,webp|max:5120',
            'description' => 'required|string|max:255',
        ]);

        $gallery = Gallery::where('id', $gallery)->first();

        if ($request->hasFile('photo')) {

            $image = $request->file('photo');
            $image->storeAs('public/galleries', $image->hashName());

            Storage::delete('public/galleries/' . $gallery->photo);

            $gallery->update([
                'photo' => $image->hashName(),
                'description' => $request->description,
            ]);
        } else {
            $gallery->update([
                'description' => $request->description,
            ]);
        }

        return redirect()->route('gallery.index', $identity)->with(['success' => 'Added Images Success!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($identity, $gallery)
    {
        $gallery = Gallery::where('id', $gallery)->first();

        Storage::delete('public/galleries/' . $gallery->photo);

        $gallery->delete();

        return redirect()->route('gallery.index', $identity)->with(['success' => 'Deleted Images Success!']);
    }
}
