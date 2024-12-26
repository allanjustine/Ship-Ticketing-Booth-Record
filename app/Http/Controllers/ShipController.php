<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ships = Ship::orderBy('name')->with('passengers')->paginate(10);

        return inertia('ships/Index', compact('ships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('ships/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:ships',
            'capacity' => 'required',
            'travel_duration' => 'required',
            'business' => 'required',
            'premium' => 'required',
            'economy' => 'required',
            'status' => 'required',
        ]);

        Ship::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'travel_duration' => $request->travel_duration,
            'business' => $request->business,
            'premium' => $request->premium,
            'economy' => $request->economy,
            'status' => $request->status,
        ]);

        return redirect('/ships')->with('success', 'A new ship has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ship = Ship::findOrFail($id);

        return Inertia::render('ships/Edit', [
            'ship' => $ship,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ship $ship)
    {
        $ship->update([
            'name' => $request->input('name'),
            'capacity' => $request->input('capacity'),
            'travel_duration' => $request->input('travel_duration'),
            'business' => $request->input('business'),
            'premium' => $request->input('premium'),
            'economy' => $request->input('economy'),
            'status' => $request->input('status'),

        ]);


        return redirect('/ships')->with('success', 'The ship updated successfully.');
    }

    public function delete($id)
    {
        $ship = Ship::findOrFail($id);

        return Inertia::render('ships/Delete', [
            'ship' => $ship,
        ]);
    }

    public function destroy($id)
    {
        $ship = Ship::findOrFail($id);

        $passengerUse = Passenger::where('ship_id', $id)->exists();
        if ($passengerUse) {
            return back()->with('error', 'Cannot delete the ship as it is in use by passengers.');
        }

        $ship->delete();

        return redirect('/ships')->with('success', 'Ship deleted from list successfully');
    }
}
