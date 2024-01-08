@if(Session::has('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{session('success')}}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif

@if(Session::has('error'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <p>{{session('error')}}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif
@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif