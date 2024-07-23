<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Identity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $identities = Identity::all();
        return view('admin.dashboard', compact('identities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/admin/identity/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'male_fullname' => 'required|string|max:255',
            'male_nickname' => 'required|string|max:255',
            'male_description' => 'required|string|max:255',
            'male_socmed' => 'required|string|max:255',
            'female_fullname' => 'required|string|max:255',
            'female_nickname' => 'required|string|max:255',
            'female_description' => 'required|string|max:255',
            'female_socmed' => 'required|string|max:255',
        ]);

        $identity_id = $request->male_nickname . '-dan-' . $request->female_nickname;

        Identity::create([
            'identity_id' => $identity_id,
            'male_fullname' => $request->male_fullname,
            'male_nickname' => $request->male_nickname,
            'male_description' => $request->male_description,
            'male_socmed' => $request->male_socmed,
            'female_fullname' => $request->female_fullname,
            'female_nickname' => $request->female_nickname,
            'female_description' => $request->female_description,
            'female_socmed' => $request->female_socmed,
        ]);

        return redirect()->route('dashboard')->with(['success' => 'Added identities Success!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($identity)
    {
        $identity = Identity::Where('identity_id',  $identity)->first();

        return view('admin.identity.detail', compact('identity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($identity)
    {
        $identity = Identity::Where('identity_id',  $identity)->first();
        return view('/admin/identity/edit', compact('identity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $identity)
    {
        $request->validate([
            'male_fullname' => 'required|string|max:255',
            'male_nickname' => 'required|string|max:255',
            'male_description' => 'required|string|max:255',
            'male_socmed' => 'required|string|max:255',
            'female_fullname' => 'required|string|max:255',
            'female_nickname' => 'required|string|max:255',
            'female_description' => 'required|string|max:255',
            'female_socmed' => 'required|string|max:255',
        ]);

        $identity = Identity::Where('identity_id',  $identity)->first();
        $identity_id = $request->male_nickname . '-dan-' . $request->female_nickname;

        $identity->update([
            'identity_id' => $identity_id,
            'male_fullname' => $request->male_fullname,
            'male_nickname' => $request->male_nickname,
            'male_description' => $request->male_description,
            'male_socmed' => $request->male_socmed,
            'female_fullname' => $request->female_fullname,
            'female_nickname' => $request->female_nickname,
            'female_description' => $request->female_description,
            'female_socmed' => $request->female_socmed,
        ]);

        return redirect()->route('dashboard')->with(['success' => 'Updated identities Success!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($identity)
    {
        $gallery = Gallery::all()->where('identity_id', $identity);
        $identity = Identity::Where('identity_id',  $identity)->first();
        
        foreach ($gallery as $images) {
            $image = $images->photo;
            Storage::delete('public/galleries/' . $image);
        }
        $identity->delete();

        return redirect()->route('dashboard')->with(['success' => 'Deleted identities Success!']);
    }
}
