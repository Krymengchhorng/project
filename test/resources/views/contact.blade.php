@extends('layouts.master')
@section('content')
<h1>Contact Page</h1>
    <hr>

    <p>
        Phone: {!!$phone!!}
    </p>
    <p>
        @if($age<=18)
            You are young!
        @elseif($age<=30)
            You are adult!!
        @else
            you are old!!
        @endif

    </p>
    <ul>
        @for($i=1;$i<=10;$i++)
        <li>{{$i}}</li>
        @endfor
    </ul>
    @php($arr=array(1,2,3,4,5))
    @foreach($arr as $a)
        {{$a}}<br>
    @endforeach
    
@endsection


 