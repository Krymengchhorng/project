@extends('layouts.master')
@section('content')
<h1>Create Customer</h1>
<p>
    <a href="{{url('customer')}}" class="btn btn-primary">Back</a>
</p>
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
<form action="{{url('customer/update')}}" method="POST" autocomplete="off" enctype="multipart/form-data">


    @csrf
    <input type="hidden" name="id" value="{{$customer->id}}">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row">
                <label for="name" class="col-sm-3 p-3">Name <span class="text-danger" >*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="name" id="name" class="form-control"  value="{{$customer->name}}"
                    required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="gender" class="col-sm-3 p-3">Gender <span class="text-danger" >*</span></label>
                <div class="col-sm-8">
                    <select name="gender" id="gender" class="form-control">
                        <option value="M"{{ $customer->gender == 'M'?'selected': ''}}>Male</option>
                        <option value="F"{{ $customer->gender == 'F'?'selected': ''}}>Female</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-3 p-3">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="email" id="email"
                        value="{{$customer->email}}" >
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-sm-3 p-3">Phone </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="phone" id="phone"
                    value="{{$customer->phone}}" >
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-sm-3 p-3">Address </label>
                <div class="col-sm-8">
                    <textarea name="address" id="address" cols="30" rows="2" class="form-control">
                    {{$customer->address}}
                    </textarea>
                </div>
            </div>
            <div class="col-sm-4">
            <div class="form-group row">
                    <label for="region" class="col-sm-3 p-3  ">Region</label>
                    <div class="col-sm-8 ">
                        
                        <select name="region_id" class="form-control" id="region">
                            <option value="0"></option>
                            @foreach($regions as $r)
                                <option value="{{$r->id}}"{{$r->id == $customer->region_id?'selected':''}}>{{$r->name}}</option>
                            @endforeach 
                            
                            
                        </select>
             </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-3 p-3  ">Photo</label>
                    <div class="col-sm-8 ml-5 p-3">
                        <input type="file" class="form-control" name="photo" id="photo">
                        
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 "></label>
                <div class="col-sm-8 p-3">
                    <button class="btn btn-success">Save</button>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection