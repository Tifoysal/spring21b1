@extends('backend.master')

@section('page')

    <a class="btn btn-info" href="{{route('product.create.form')}}">Create Product</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">QTY</th>
            <th scope="col">Category ID</th>
            <th scope="col">Active</th>
        </tr>
        </thead>
        <tbody>

        @foreach($product as $key=>$data)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$data->name}}</td>
            <td>{{$data->price}}</td>
            <td>{{$data->quantity}}</td>
            <td>{{$data->category_id}}</td>
            <td>
                <a class="btn btn-success" href="">View</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection
