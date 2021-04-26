@extends('frontend.master')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <form action="{{route('car.booking')}}" method="post">
                @csrf
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <input type="hidden" value="{{$car->id}}" name="car_id">
                <label for="">Service Name/Car Name: {{$car->name}}</label>
                <label for="">Rate: {{$car->price}} BDT</label>
                <div class="form-group">
                    <label for="">From Date:</label>
                    <input required name="from_date" type="date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">To Date:</label>
                    <input required name="to_date" type="date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Details:</label>
                    <textarea  name="details" id="" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
            </form>
        </div>
    </div>
@endsection
