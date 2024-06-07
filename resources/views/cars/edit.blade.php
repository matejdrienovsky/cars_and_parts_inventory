@extends('layout.app')

@section('content')
    <h1>Edit car</h1>
    <hr>
    <form action="{{url('cars', [$car->id])}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Car name</label>
            <input type="text" value="{{$car->name}}" class="form-control" id="carName"  name="name" >
        </div>
        <div class="form-group">
            <label for="registration_number">Registration Number</label>
            <input type="text" class="form-control" id="car_registration_number" name="registration_number" value="{{$car->registration_number}}">
        </div>

        <div class="form-group form-inline">
            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" id="is_registered" name="is_registered" @if(old('is_registered', $car->is_registered)) checked @endif>
                <label class="form-check-label ml-2" for="is_registered">Is registered?</label>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
