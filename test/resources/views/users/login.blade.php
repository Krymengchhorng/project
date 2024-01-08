@extends('layouts.master')
@section('content')
<h2>User Login</h2>
<hr>

<form action="{{url('login/dologin')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-7">
            <div class="form-group row">
                <label for="username" class="col-sm-3">Username</label>
                <div class="col-sm-9 m-3">
                <input type="username" class="form-control" id="username" 
                name="username" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-3">Password</label>
                <div class="col-sm-9 m-3">
                <input type="password" class="form-control" id="password" 
                name="password" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3"></label>
                <div class="col-sm-9 m-5">
                    <button class="btn btn-primary btn-sm">Login</button>
                    <p></p>
                    <p class="text-danger">
                        {{session('error')}}
                    </p>

                </div>
            </div>

        </div>
    </div>
</form>

@endsection