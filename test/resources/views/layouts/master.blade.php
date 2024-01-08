<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('chosen/chosen.min.css')}}">
    @yield('css')
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <a class="navbar-brand" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link active"  href="{{('/')}}">{{trans('label.home')}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('about')}}">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('contact')}}">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('product')}}">{{trans('label.product')}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('user')}}">{{trans('label.user')}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('upload')}}">Upload</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('customer')}}">Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('category.index')}}">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('region')}}">Region</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('logout')}}">Logout</a>
      </li>
      <div class="nav-item">
        <a href="#" class="nav-link" >{{@Auth::user()->email}}</a>
      </div>
      
      
    
    

</div>
</nav>
    </div>

    
   <div class="container">
        @yield('content')

   </div>
    
    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
    @yield('js')
</body>
</html>