@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Category</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($Products as $Product)
                <tr>
                    <td>{{$Product->id}}</td>
                    <td><img src="{{ asset('images/') }}/{{$Product->image}}"  alt="" width="100" class="img-fluid"></td>
                    <td>{{$Product->name}}</td>
                    <td>{{$Product->description}}</td>
                    <td>RM{{$Product->price}}</td>
                    <td>{{$Product->quantity}}</td>
                    <td>{{$Product->CategoryID}}</td>
                    <td><a href="{{ route('editProduct',['id'=>$Product->id])}}" class="btn btn-warning btn-xs">Edit</a>&nbsp;
                    <a href="{{route('deleteProduct',['id'=>$Product->id])}} " class="btn btn-danger btn-xs" onClick="return confirm('Are you sure to delete this product?')">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection