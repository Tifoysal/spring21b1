@extends('backend.master')
@section('page')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
       Create Category
    </button>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>

        @foreach($categories as $data)
        <tr>
            <th scope="row">{{$data->id}}</th>
            <td>{{$data->name}}</td>
            <td>{{$data->description}}</td>
            <td>
                <a class="btn btn-success" href="">View</a>
                <a class="btn btn-danger" href="">Delete</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('category.create')}}" method="post">
                    @csrf
                <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input name="category_name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category name">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Description</label>
                            <textarea class="form-control" name="description" id="" placeholder="Enter Description..."  ></textarea>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop
