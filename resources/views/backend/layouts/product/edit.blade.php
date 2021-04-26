@extends('backend.master')

@section('page')


    <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Enter Product name:</label>
                    <input value="{{$product->name}}" name="product_name" type="text" class="form-control" placeholder="Enter Product Name...">
                </div>

                <div class="form-group">
                    <label for="">Enter Product Price:</label>
                    <input value="{{$product->price}}" name="product_price" type="number" class="form-control" placeholder="Enter Product price...">
                </div>

                <div class="form-group">
                    <label for="">Enter Product Qty:</label>
                    <input value="{{$product->quantity}}" name="product_qty" type="number" class="form-control" placeholder="Enter Product qty...">
                </div>


                <div class="form-group">
                    <label for="">Select Product Category:</label>
                    <select class="form-control" name="category_id" id="">
                        @foreach($categories as $data)
                        <option @if($product->category_id==$data->id) selected @endif value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Upload Image</label>
                    <input name="product_image" type="file" class="form-control">
                </div>

                <br>
                <button type="submit" class="btn btn-success">Submit</button>


            </div>


        </div>
    </form>



@endsection
