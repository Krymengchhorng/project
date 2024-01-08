@extends('layouts.master')
@section('content')
    <h1>Sell Product</h1>
    <hr>
    <form action="{{url('product/sell')}}" method="post">

    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row p-3">
                <label for="pname" class="col-sm-3">Product Name:</label>
                <div class="col-sm-9">
                    <input type="text" name="pname" id="pname" class="form-control" >
                </div>

            </div>
            <div class="form-group row p-3">
                <label for="qty" class="col-sm-3">Product QTY:</label>
                <div class="col-sm-9">
                    <input type="text" name="qty" id="qty" class="form-control" >
                </div>

            </div>
            <div class="form-group row p-3">
                <label for="price" class="col-sm-3">Unit Price:</label>
                <div class="col-sm-9">
                    <input type="text" name="price" id="price" class="form-control" >
                </div>

            </div>
            <div class="form-group row p-3">
                <label for="disc" class="col-sm-3">Discount(%):</label>
                <div class="col-sm-9">
                    <input type="text" name="disc" id="disc" class="form-control" >
                </div>

            </div>
            <div class="form-group row p-3">
                <label for="total" class="col-sm-3">Total($):</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"  id="total" disabled value={{$total}}  >
                </div>

            </div>
            <div class="form-group row p-3">
                <label  class="col-sm-3"></label>
                <div class="col-sm-9">
                <button class="btn btn-primary">Submit</button>
                </div>

            </div>

        </div>
    </div>
   
    </form>

    
@endsection