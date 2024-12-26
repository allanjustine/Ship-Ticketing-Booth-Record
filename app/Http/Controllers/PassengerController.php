<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use App\Models\Passenger;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passengers = Passenger::orderBy('name')->with('ship')->paginate(10);

        return inertia('passengers/Index', compact('passengers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ships = Ship::where('status', 'Available')->get();
        return inertia('passengers/Create', [
            'ships' => $ships
        ]);
        return inertia('passengers/Create');
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
            'name' => 'required',
            'gender' => 'required',
            'seat_number' => 'required|unique:passengers',
            'arrival' => 'required',
            'departure' => 'required',
            'age' => 'required',
            'ticket_acquired' => 'required',
            'ship_id' => 'required'
        ]);

        Passenger::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'seat_number' => $request->seat_number,
            'arrival' => $request->arrival,
            'ticket_acquired' => $request->ticket_acquired,
            'age' => $request->age,
            'departure' => $request->departure,
            'ship_id' => $request->ship_id
        ]);

        return redirect('/passengers')->with('success', 'A new passenger has been added.');
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
        $passenger = Passenger::with('ship')->findOrFail($id);
        $ships = Ship::where('status', 'Available')->get();

        return Inertia::render('passengers/Edit', [
            'passenger' => $passenger,
            'ships' => $ships,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Passenger $passenger)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'seat_number' => 'required|unique:passengers,name,' . $passenger->id,
            'arrival' => 'required',
            'departure' => 'required',
            'ticket_acquired' => 'required',
            'age' => 'required',
            'ship_id' => 'required'
        ]);

        $passenger->update([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'seat_number' => $request->input('seat_number'),
            'arrival' => $request->input('arrival'),
            'departure' => $request->input('departure'),
            'ticket_acquired' => $request->input('ticket_acquired'),
            'age' => $request->input('age'),
            'ship_id' => $request->input('ship_id')

        ]);


        return redirect('/passengers')->with('success', 'The passenger detail updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $passengers = Passenger::with('ship')->findOrFail($id);
        $ships = Ship::all();

        return Inertia::render('passengers/Delete', [
            'passengers' => $passengers,
            'ships' => $ships,
        ]);
    }

    public function destroy($id)
    {
        $passenger = Passenger::findOrFail($id);
        $passenger->delete();

        return redirect('/passengers')->with('success', 'Passenger deleted from list successfully');
    }

    public function view($id)
    {
        $passengers = Passenger::with('ship')->findOrFail($id);
        $ships = Ship::all();

        return Inertia::render('passengers/View', [
            'passengers' => $passengers,
            'ships' => $ships,
        ]);
    }
}
