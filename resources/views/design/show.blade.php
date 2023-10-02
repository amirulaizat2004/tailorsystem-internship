@extends('layout.main')

@section('content')



<h4 class="card-title">Detail Customer Design</h4>

<div class="form-group row mt-4">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Customer</label>
    <div class="col-sm-10">
        {{ $data->customers->name??'' }}
    </div>
  </div>

<div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Choice</label>
    <div class="col-sm-10">
        {{ $data->assetlookup3->description??'' }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Type of Clothing</label>
    <div class="col-sm-10">
        {{ $data->assetlookup1->description??'' }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Type of Fabric</label>
    <div class="col-sm-10">
        {{ $data->assetlookup->description??'' }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Pattern</label>
    <div class="col-sm-10">
        {{ $data->code??'' }}
    </div>
  </div>

  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Colour</label>
    <div class="col-sm-10">
        {{ $data->color??'' }}
    </div>
  </div>
   
  <div class="mt-3 float-right">
    <a class="btn btn-dark" href="{{ route('design.index') }}">Cancel</a>
  </div>

@endsection