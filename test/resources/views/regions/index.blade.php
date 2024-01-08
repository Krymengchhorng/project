@extends('layouts.master');
@section('content')
<h1>
    Region
</h1>
<ul>
    @foreach($rg as $r)
    <li>{{$r->name}} <span class="text-danger">({{$r->total}}នាក់)</span></li>
    @endforeach
</ul>
{{$rg->links()}}
<hr>@endsection-