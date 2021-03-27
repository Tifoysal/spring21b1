@extends('backend.master')

@section('page')


    <form action="{{route('product.create')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Enter Product name:</label>
                    <input name="product_name" type="text" class="form-control" placeholder="Enter Product Name...">
                </div>

                <div class="form-group">
                    <label for="">Enter Product Price:</label>
                    <input name="product_price" type="number" class="form-control" placeholder="Enter Product price...">
                </div>

                <div class="form-group">
                    <label for="">Enter Product Qty:</label>
                    <input name="product_qty" type="number" class="form-control" placeholder="Enter Product qty...">
                </div>

                <div class="form-group">
                    <label for="">Select Product Category:</label>
                    <select class="form-control" name="category_id" id="">
                        @foreach($categories as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>


            </div>


        </div>
    </form>



@endsection
