@extends('backend.master')

@section('page')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Car</th>
            <th scope="col">User</th>
            <th scope="col">From Date</th>
            <th scope="col">To Date</th>
            <th scope="col">Rate</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

@foreach($allBooking as $key=>$data)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$data->car->name}}</td>
                <td>{{$data->user->name}}</td>
                <td>{{date("Y-M-d",strtotime($data->booking_from))}} </td>
                <td>{{date("Y-M-d",strtotime($data->booking_to))}}</td>

                <td>{{$data->rate}}</td>
                <td>{{$data->total}}</td>
                <td>fsadfasfsdf</td>
                <td><a href="">view</a></td>
            </tr>

@endforeach

        </tbody>

    </table>

@endsection
