@extends('layout.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <h1>Cars list</h1>

    <form method="GET" action="" class="d-flex align-items-end">
        <select name="is_registered" class="form-control mr-2 mb-2" id="filter" style="width: auto;">
            <option value="">Select Filter</option>
            <option value="">All</option>
            <option value="1">Registered</option>
            <option value="0">Not registered</option>
        </select>
        <button type="submit" class="btn btn-secondary mb-2">Filter</button>
    </form>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Registration number</th>
            <th scope="col">Is registered</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)
            <tr>
                <td>{{$car->name}}</td>
                <td>{{$car->registration_number}}</td>
                <td>{{ $car->is_registered ? 'Yes' : 'No' }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-warning" href="{{ URL::to('cars/' . $car->id . '/edit') }}">
                            Edit
                        </a>&nbsp;&nbsp;
                        <form action="{{url('cars', [$car->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
