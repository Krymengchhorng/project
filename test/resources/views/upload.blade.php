@extends('layouts.master')
@section('css')
<style>

</style>
@endsection

@section('content')
    <h1>Upload File</h1>
    <hr>
    <form action="{{('upload/save')}}" method="post" enctype="multipart/form-data" >

    {{csrf_field()}}
    <p>
        File: <input type="file" name="photo[]" accept="image/*" onchange="preview(event)" multiple id="">
    </p>
    <div id="photos">

    </div>
    
    <p>
        <button>Upload</button>
    </p>
    @if(Session::has('error'))
    <p>
        {{session('error')}}
    </p>
    @endif

    @if(Session::has('success'))
    <p>
        {{session('success')}}
    </p>
    @endif
    </form>
    @endsection
    @section('js')
    <script>
        function preview(evt){
            
            let photos = evt.target.files;
            let img = "";
            for(let i=0; i<photos.length; i++){
                let src = URL.createObjectURL(evt.target.files[i]);

                img += "<img src='" + src + "' width='150' class'img'  >";
            }
            document.getElementById('photos').innerHTML = img;
            
        }
    </script>
    @endsection
    
