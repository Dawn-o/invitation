<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use App\Models\identity;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($identity_id)
    {
        $data = Agenda::all()->where('identity_id', $identity_id);

        return view('admin.agenda.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/admin/agenda/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'agenda_name' => 'required|string|max:255',
            'agenda_location' => 'required|string|max:255',
            'agenda_date' => 'required|string|max:255',
        ]);


        Agenda::create([
            'agenda_name' => $request->agenda_name,
            'agenda_location' => $request->agenda_location,
            'agenda_date' => $request->agenda_date,
        ]);

        return redirect()->route('agenda.index')->with(['success' => 'Add Data Success!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(agenda $agenda)
    {
        //
    }
}
