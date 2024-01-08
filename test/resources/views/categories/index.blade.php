@extends('layouts.master')
@section('content')
<h1 class="text-primary" >Category List</h1>

<div class="row">
    <div class="col-sm-1">
    <a href="{{route('category.create')}}" class="btn btn-primary btn-sm">Create</a>
    </div>
    
</div>

@if(Session::has('success'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <p>{{session('success')}}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" >&times;</span>
    </button>
</div>
    
@endif
<table class="table-sm table-bordered">
    <thead>
        <tr>
            <th>#</th>
            
            <th>Name</th>
            <th>Actions</th>
            
        </tr>
    </thead>
    <tbody>

        <?php
            $page = @$_GET['page'];
            if(!$page)
            {
                $page = 1;
            }
            $i = config('app.row')  * ($page - 1) + 1;
        ?>
        @foreach($cats as $c)
        <tr>
            <td>{{$i++}}</td>
            
            <td>{{$c->name}}</td>
            
            <td>
                <a href="{{route('category.delete', $c->id)}}" class="btn btn-danger btn-sm"
                onclick="return confirm('You Want to Delete? ')">Delete</a>
                <a href="{{route('category.edit', $c->id)}}" class="btn btn-success btn-sm">Edit</a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>
{{$cats->links()}}
@endsection