@extends('layout.main')

@section('content')



<h4 class="card-title">Detail Customer</h4>

<div class="form-group row mt-4">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        {{ $data->name??'' }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        {{ $data->email??'' }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
        {{ $data->address??'' }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Contact</label>
    <div class="col-sm-10">
        {{ $data->no_phone??'' }}
    </div>
  </div>
   
  <div class="mt-3 float-right">
    <a class="btn btn-dark" href="{{ route('customer.index') }}">Cancel</a>
  </div>

@endsection