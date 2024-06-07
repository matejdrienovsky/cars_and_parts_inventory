@extends('layout.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <h1>Parts list</h1>

    <form method="GET" action="" class="d-flex align-items-end">
        <select name="part_name" class="form-control mr-2 mb-2" id="filter" style="width: auto;">
            <option value="">Select Part</option>
            <option value="">All</option>
            @foreach ($partsDistinctNames as $partsDistinctName)
                <option value="{{ $partsDistinctName->name }}">{{ $partsDistinctName->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-secondary mb-2">Filter</button>
    </form>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Serial number</th>
            <th scope="col">Car ID</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($parts as $part)
            <tr>
                <td>{{$part->name}}</td>
                <td>{{$part->serialnumber}}</td>
                <td>{{ $part->car_id}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-warning" href="{{ URL::to('parts/' . $part->id . '/edit') }}">
                            Edit
                        </a>&nbsp;&nbsp;
                        <form action="{{url('parts', [$part->id])}}" method="POST">
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
