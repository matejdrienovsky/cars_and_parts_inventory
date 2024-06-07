@extends('layout.app')

@section('content')
    <h1>New part</h1>
    <hr>
    <form action="/parts" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Part name</label>
            <input type="text" class="form-control" id="partName"  name="name">
        </div>

        <div class="form-group">
            <label for="serialnumber">Serial Number</label>
            <input type="text" class="form-control" id="part_serialnumber" name="serialnumber">
        </div>

        <div class="form-group">
            <label for="car_id">Car ID</label>
            <input type="text" class="form-control" id="car_id" name="car_id">
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
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
