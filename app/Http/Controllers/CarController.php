<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CarController extends Controller
{
    /**
     * Display a list of cars
     */
    public function index()
    {
        $isRegistered = request()->get('is_registered');

        if($isRegistered !== null){
            $cars = Car::where('is_registered', $isRegistered)->get();
        } else {
            $cars = Car::all();
        }

        return view('cars.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new car
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Function to handle POST request to create a new Car
     */
    public function store(Request $request)
    {
        // Validation rules for the incoming request
        $request->validate([
            'name' => ['required',Rule::unique('cars', 'name'), 'max:255'],
            'registration_number' => 'required_if:is_registered,on',
            'is_registered' => 'required_with:registration_number'
        ]);

        // Creating a new Car with request data
        $car = Car::create([
            'name' => $request->name,
            'is_registered' => $request->has('is_registered') ? 1 : 0,
            'registration_number' => $request->has('registration_number') ? $request->registration_number : null,
        ]);

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified car to edit
     */
    public function edit(Car $car)
    {
        return view('cars.edit', ['car' => $car]);
    }

/**
     * Function to handle PUT request to update a Car
     */
    public function update(Request $request,  Car $car)
    {
        // Validation rules for the incoming request
        $request->validate([
            'name' => ['required',Rule::unique('cars', 'name'), 'max:255'],
            'registration_number' => 'required_if:is_registered,on',
            'is_registered' => 'required_with:registration_number'
        ]);

        //Updating the Car with request data
        $car->name = $request->name;
        $car->is_registered = $request->has('is_registered') ? 1 : 0;
        $car->registration_number = $request->has('registration_number') ? $request->registration_number : null;
        $car->save();

        // Flash a successful update message
        $request->session()->flash('message', 'Successfully updated car');

        // Redirecting to the cars listing after successful update
        return redirect()->route('cars.index');
    }

    /**
     * Function to handle DELETE request to delete a Car
     */
    public function destroy(Request $request, Car $car)
    {
        $car -> delete();
        $request->session()->flash('message', 'Successfully deleted car');
        return redirect()->route('cars.index');
    }
}
