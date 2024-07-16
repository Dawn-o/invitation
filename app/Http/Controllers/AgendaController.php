<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($identity)
    {
        $agendas = Agenda::all()->where('identity_id', $identity);

        return view('admin.agenda.list', compact('agendas', 'identity'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($identity)
    {
        return view('/admin/agenda/create', compact('identity'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $identity)
    {
        $request->validate([
            'agenda_name' => 'required|string|max:255',
            'agenda_location' => 'required|string|max:255',
            'agenda_date' => 'required|string|max:255',
        ]);

        Agenda::create([
            'identity_id' => $identity,
            'agenda_name' => $request->agenda_name,
            'agenda_location' => $request->agenda_location,
            'agenda_date' => $request->agenda_date,
        ]);

        return redirect()->route('agenda.index', $identity)->with(['success' => 'Added agendas Success!']);
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
    public function edit($identity, $agenda)
    {
        $agenda = Agenda::Where('id', $agenda)->first();
        return view('/admin/agenda/edit', compact('agenda', 'identity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $identity, $agenda)
    {
        $request->validate([
            'agenda_name' => 'required|string|max:255',
            'agenda_location' => 'required|string|max:255',
            'agenda_date' => 'required|string|max:255',
        ]);

        $agenda = Agenda::Where('id', $agenda)->first();

        $agenda->update([
            'agenda_name' => $request->agenda_name,
            'agenda_location' => $request->agenda_location,
            'agenda_date' => $request->agenda_date,
        ]);

        return redirect()->route('agenda.index', $identity)->with(['success' => 'Updated agendas Success!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($identity, $agenda)
    {
        $agenda = Agenda::Where('id', $agenda)->first();

        $agenda->delete();

        return redirect()->route('agenda.index', $identity)->with(['success' => 'Deleted agendas Success!']);
    }
}
