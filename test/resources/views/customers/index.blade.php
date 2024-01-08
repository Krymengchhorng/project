@extends('layouts.master')
@section('content')
<h1 class="text-primary" >Customer List</h1>

<div class="row">
    <div class="col-sm-1">
    <a href="{{url('customer/create')}}" class="btn btn-primary btn-sm">Create</a>
    </div>
    <div class="col-sm-5">
        <form action="{{url('customer/search')}}">
            <input type="text" name="q" id="q" value="{{$q}}"><button>Search</button>
        </form>
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
{{bcrypt('123')}}
<table class="table-sm table-bordered">
    <thead>
        <tr>
            <th>#</th>
            
            <th>Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <!-- <th>Photo</th>  -->
            <th>Regions</th>
            <th>Action</th>
            
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
        @foreach($customers as $c)
        <tr>
            <td>{{$i++}}</td>
            
            <td>{{$c->name}}</td>
            <td>{{$c->gender}}</td>
            <td>{{$c->email}}</td>
            <td>{{$c->phone}}</td>
            <td>{{$c->address}}</td>
            <td>{{$c->gname}}</td>
            <td>
                <a href="{{route('customer.delete', $c->id)}}" class="btn btn-danger btn-sm"
                onclick="return confirm('You Want to Delete? ')">Delete</a>
                <a href="{{url('customer/edit/'.$c->id)}}" class="btn btn-success btn-sm">Edit</a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>
{{$customers->appends(request()->query())->links()}}
<div>
    Total: {{$total}}, Male:{{$male}}, Female: {{$female}}, Min Rate:{{$min}}, Max Rate: {{$max}}, Sum Rate: {{$sum}}
</div>
@endsection