@extends('layouts.master')
@section('content')
    <h1>Product List</h1>
    <p>
        <a href="{{route('product.create')}}" class="btn btn-primary btn-sm">Create</a>
        
    </p>
    @component('coms.alert')
@endcomponent
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>QTY</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>

            <td>{{$p->id}}</td>
            <td>{{$p->name}}</td>
            <td>{{$p->quantity}}</td>
            <td>{{$p->price}}</td>
            <td>{{$p->cname}}</td>
            <td>
                <a href="{{route('product.edit', $p->id)}}" class="btn btn-success btn-sm">
                    Edit
                </a>
                <a href="{{route('product.delete',$p->id)}}" class="btn btn-danger btn-sm" 
                    onclick="return confirm('Are you sure?')">Delete</a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$products->links()}}

@endsection