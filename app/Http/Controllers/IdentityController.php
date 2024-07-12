<?php

namespace App\Http\Controllers;

use App\Models\identity;
use Illuminate\Http\Request;

class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Identity::all();
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

        return redirect()->route('identity.index')->with(['success' => 'Add Data Success!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(identity $identity)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(identity $identity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, identity $identity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(identity $identity)
    {
        //
    }
}
