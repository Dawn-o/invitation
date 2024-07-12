<?php

namespace App\Http\Controllers;

use App\Models\quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
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
        return view('/admin/quote/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'quote' => 'required|string|max:255',
            'source' => 'required|string|max:255',
        ]);


        Quote::create([
            'quote' => $request->quote,
            'source' => $request->source,
        ]);

        return redirect()->route('quote.index')->with(['success' => 'Add Data Success!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(quote $quote)
    {
        //
    }
}
