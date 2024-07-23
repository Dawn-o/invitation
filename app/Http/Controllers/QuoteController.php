<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($identity)
    {
        $quotes = Quote::all()->where('identity_id', $identity);

        return view('admin.quote.list', compact('quotes', 'identity'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($identity)
    {
        return view('/admin/quote/create', compact('identity'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $identity)
    {
        $request->validate([
            'quote' => 'required|string|max:255',
            'source' => 'required|string|max:255',
        ]);


        Quote::create([
            'identity_id' => $identity,
            'quote' => $request->quote,
            'source' => $request->source,
        ]);

        return redirect()->route('quote.index', $identity)->with(['success' => 'Added Data Success!']);
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
    public function edit($identity, $quote)
    {
        $quote = Quote::Where('id', $quote)->first();
        return view('/admin/quote/edit', compact('quote', 'identity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $identity, $quote)
    {
        $request->validate([
            'quote' => 'required|string|max:255',
            'source' => 'required|string|max:255',
        ]);

        $quote = Quote::where('id', $quote)->first();

        $quote->update([
            'identity_id' => $identity,
            'quote' => $request->quote,
            'source' => $request->source,
        ]);

        return redirect()->route('quote.index', $identity)->with(['success' => 'Updated Data Success!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($identity, $quote)
    {
        $quote = Quote::where('id', $quote)->first();

        $quote->delete();

        return redirect()->route('quote.index', $identity)->with(['success' => 'Deleted Data Success!']);

    }
}
