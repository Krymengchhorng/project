

@extends('layouts.master')
@section('content')
<h1>Edit Category</h1>
<hr>
@if(Session::has('success'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <p>{{session('success')}}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" >&times;</span>
    </button>
</div>
    
@endif

@if(Session::has('error'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <p>{{session('error')}}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" >&times;</span>
    </button>
</div>
    
@endif
<form action="{{route('category.update',$cat->id)}}" method="POST" autocomplete="off">


    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row">
                <label for="name" class="col-sm-3 p-3">Name <span class="text-danger" >*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="name" id="name" class="form-control" 
                    required autofocus value="{{$cat->name}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 "></label>
                <div class="col-sm-8 p-3">
                    <button class="btn btn-success">Save</button>
                </div>
            </div>
            

            

        </div>
        <div class="col-sm-4">

        </div>
    </div>
</form>
@endsection