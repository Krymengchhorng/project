@extends('layouts.master')
@section('content')
<h1>Edit Users</h1>
<a href="{{route('user.index')}}" class="btn btn-success btn-sm">{{trans('label.create')}}</a>
<hr>
@component('coms.alert')
@endcomponent
<form action="{{route('user.update',$user->id)}}" method="POST" >


    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row">
                <label for="name" class="col-sm-3 p-3">Name <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="name" id="name" class="form-control" 
                     required autofocus value= "{{$user->name}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-3 p-3">Email <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <input type="email" name="email" id="email" class="form-control" value= "{{$user->email}}" >
                </div>
            </div>

            <div class="form-group row">
                <label for="username" class="col-sm-3 p-3">Username <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="username" id="username" class="form-control" required value= "{{$user->username}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-3 p-3">Password</label>
                <div class="col-sm-8">
                    <input type="password" name="password" id="password" class="form-control">
                    <p>
                        <small>Keep blank to use the old password!!!</small>
                    </p>
                </div>
            </div>

            <div class="form-group row">
                <label for="language" class="col-sm-3 p-3">Language<span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <select name="language" id="language" class="form-control" >
                        <option value="en"{{$user->language=='en'?'selected':''}}>English</option>
                        <option value="kh"{{$user->language=='kh'?'selected':''}}>ភាសាខ្មែរ</option>
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label  class="col-sm-3"></label>
                <div class="col-sm-8">
                    <button class="btn btn-primary">{{trans('label.save')}}</button>
                </div>
            </div>


        </div>


    </div>
</form>
@endsection
@section('js')
<script src="{{asset('chosen/chosen.jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.chosen-select').chosen();
    });
    function preview(evt) {
        let img = document.getElementById('img');
        img.src = URL.createObjectURL(event.target.files[0]);

    }

</script>
@endsection