@extends('layouts.master')
@section('content')
    <h1>{{trans('label.userlist')}}</h1>
    <p>
        <a href="{{route('user.create')}}" class="btn btn-primary btn-sm">{{trans('label.create')}}</a>
        
    </p>
    @component('coms.alert')
    @endcomponent
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Language</th>
                <th>{{trans('label.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $p)
            <tr>

            <td>{{$p->id}}</td>
            <td>{{$p->name}}</td>
            <td>{{$p->username}}</td>
            <td>{{$p->email}}</td>
            <td>{{$p->language}}</td>
            <td>
                <a href="{{route('user.edit', $p->id)}}" class="btn btn-success btn-sm">
                {{trans('label.edit')}}
                </a>
                <a href="{{route('user.delete',$p->id)}}" class="btn btn-danger btn-sm" 
                    onclick="return confirm('Are you sure?')">{{trans('label.delete')}}</a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$users->links()}}

@endsection