@extends('frontend.master')

@section('content')
    <style>
        /*css*/
    </style>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Album example</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

@foreach($products as $data)

                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{url('images/products/'.$data->image)}}" alt="product image">
                        <div class="card-body">
                            <p class="card-text">{{$data->name}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button onclick="cart()" type="button" class="btn btn-sm btn-primary">Add to cart</button>
                                    <a href="{{route('product.show',$data->id)}}" class="btn btn-sm btn-warning">View</a>
                                </div>
                                <small class="text-muted">{{$data->price}} BDT</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>


    <script type="text/javascript">
        // js
        function cart(){
            alert("Are you sure?");
        }
    </script>
@endsection
