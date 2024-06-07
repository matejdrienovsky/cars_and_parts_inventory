<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{

    /**
     * Display a list of parts
     */
    public function index(Request $request)
    {
        // Get the selected part name from the request and filter the parts accordingly
        $selectedPartName = $request->get('part_name');

        // If the selected part name is 'All' or empty, get all parts from the database
        // Otherwise, get the parts with the selected part name
        if ($selectedPartName == 'All' || $selectedPartName == '') {
            $parts = Part::all();
        } else {
            $parts = Part::where('name', $selectedPartName)->get();
        }

        $partsDistinctNames = Part::distinct()->get('name');

        return view('parts.index', ['parts' => $parts, 'partsDistinctNames' => $partsDistinctNames]);
    }

    /**
     * Show the form for creating a new part
     */
    public function create()
    {
        return view('parts.create');
    }

    /**
     * Function to handle POST request to create a new Part
     */
    public function store(Request $request)
    {
        // Validation rules for the incoming request
        $request->validate([
            'name' => 'required',
            'serialnumber' => ['required', 'min:10'],
            'car_id' => ['required', 'exists:cars,id']
        ]);

        // Creating a new Part with request data
        $part = Part::create([
            'name' => $request->name,
            'serialnumber' => $request->serialnumber,
            'car_id' => $request->car_id
        ]);

        return redirect()->route('parts.index');
    }

    /**
     * Display the specified part to edit
     */
    public function edit(Part $part)
    {
        return view('parts.edit', ['part' => $part]);
    }

    /**
     * Function to handle PUT request to update a Part
     */
    public function update(Request $request, Part $part)
    {
        // Validation rules for the incoming request
        $request->validate([
            'name' => 'required',
            'serialnumber' => ['required', 'min:10'],
            'car_id' => ['required', 'exists:cars,id']
        ]);

        // Update the Part with request data
        $part->name = $request->name;
        $part->serialnumber = $request->serialnumber;
        $part->car_id = $request->car_id;
        $part->save();

        // Flash a success message to the session
        $request->session()->flash('message', 'Successfully updated part');

        return redirect()->route('parts.index');
    }

    /**
     * Function to handle DELETE request to delete a Part
     */
    public function destroy(Request $request, Part $part)
    {
        $part->delete();
        $request->session()->flash('message', 'Successfully deleted part');
        return redirect()->route('parts.index');
    }

}
