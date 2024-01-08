@extends('layouts.master')
@section('content')

    <h1>User Register</h1>
    <hr>
    <form action="{{route('register.save')}}" method="POST">
        {{csrf_field()}}


        <p>
            Name: <input type="text" name='name'>
        </p>
        <p>
            Phone: <input type="text" name='phone'>
        </p>
        <p>
            Email: <input type="email" name='email'>
        </p>
        <p>
            <button>Submit</button>

        </p>

@endsection


    