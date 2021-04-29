@extends('backend.master')

@section('page')

    <a class="btn btn-info" href="{{route('product.create.form')}}">Create Product</a>


    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>



        <div class="col-md-4">
            <form action="{{route('product.search')}}" method="POST">
                @csrf
            <input name="search" type="text" placeholder="Search" class="form-control">
            <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

    </div>

    @if(isset($search))
        <p>
        <span class="alert alert-success"> you are searching for '{{$search}}' , found ({{count($product)}})</span>
        </p>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
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
            <th scope="row">{{$data->id}}</th>
            <td>
                <img style="width: 100px;" src="{{url('/images/products/'.$data->image)}}" alt="">
            </td>
            <td>{{$data->name}}</td>
            <td>{{$data->price}}</td>
            <td>{{$data->quantity}}</td>
            <td>{{$data->productCategory->name}}</td>
            <td>
                <a class="btn btn-success" href="{{route('product.edit',$data->id)}}">Edit</a>
                <a class="btn btn-danger" href="{{route('product.delete',$data->id)}}">Delete</a>
            </td>
        </tr>

        @endforeach

        </tbody>

    </table>
    {{$product->links()}}
@endsection
