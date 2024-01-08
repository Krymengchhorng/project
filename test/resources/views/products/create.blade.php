@extends('layouts.master')
@section('content')
<h1>Create Product</h1>
<hr>

@component('coms.alert')
@endcomponent
<form action="{{route('product.store')}}" method="POST" autocomplete="off">


    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row">
                <label for="name" class="col-sm-3 p-3">Name <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="name" id="name" class="form-control" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-sm-3 p-3">Category <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <select name="category_id" id="category" class="form-control" required>
                        <option value="">Select One</option>
                        @foreach($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="qty" class="col-sm-3 p-3">Quantity <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="quantity" id="qty" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-sm-3 p-3">Price <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="price" id="price" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <label  class="col-sm-3"></label>
                <div class="col-sm-8">
                    <button class="btn btn-primary">Save</button>
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