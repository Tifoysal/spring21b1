@extends('backend.master')

@section('page')

    <h1>Booking Report</h1>

    <form action="{{route('booking.report')}}" method="GET">

        <div class="row">
            <div class="col-md-8">
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="from"> Date from:</label>
                        <input value="{{$fromDate}}" id="from" type="date" class="form-control" name="from_date">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="to"> Date to:</label>
                        <input value="{{$toDate}}" id="to" type="date" class="form-control" name="to_date">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <button type="button" onclick="printDiv()" class="btn btn-success">Print</button>
                </div>
            </div>

        </div>
    </form>

    <div id="printArea">
        <h4>Booking Report from {{$fromDate}} to {{$toDate}}</h4>
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

        </tr>
        </thead>
        <tbody>
        @if(count($allBooking)>0)
            @foreach($allBooking as $key=>$data)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$data->car->name}}</td>
                    <td>{{$data->user->name}}</td>
                    <td>{{date("Y-M-d",strtotime($data->booking_from))}} </td>
                    <td>{{date("Y-M-d",strtotime($data->booking_to))}}</td>

                    <td>{{$data->rate}}</td>
                    <td>{{$data->total}}</td>

                </tr>

            @endforeach
        @else
            <tr>
                <td colspan="">
                    <h2 style="color: red">No data found!.</h2>
                </td>
            </tr>

        @endif
        </tbody>

    </table>
    </div>

    <script type="text/javascript">
        function printDiv(){
            var printContents = document.getElementById("printArea").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();

            document.body.innerHTML = originalContents;

        }
    </script>
@endsection
