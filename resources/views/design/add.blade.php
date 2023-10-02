

@extends('layout.main')


@section('content')
<style>
  #select2{
   display: none;
}

</style>

<h4 class="card-title">Design</h4>
<p class="card-description"> Add New  </p>

<form class="forms-sample" method="post" action="{{ route('design.store') }}">
    @csrf


  


<input name="cust_id" type="hidden" value="{{ $models->measurement->designs->cust_id??'' }} ">

<div class="form-group row">
  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Choice</label>
  <div class="col-sm-10">
    <select class="form-control text-light @error('choice') is-invalid @enderror" id="select1" name="choice" value="{{ old('choice', $model->choice??'') }}">
      <option value="">- Default select -</option>
      @isset($pilihan)
      @foreach ($pilihan as $key4=>$item4)
      <option {{(old('choice',$model->choice) == $key4) ? 'Selected' : ''}} value="{{$key4}}">{{$item4}}</option>
      @endforeach
      @endisset
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Clothing</label>
  <div class="col-sm-10">
    <select class="form-control text-light @error('id_style') is-invalid @enderror" id="id_style" name="id_style" value="{{ old('id_style', $model->id_style??'') }}">
      <option value="">- Default select -</option>
      @isset($baju)
      @foreach ($baju as $key4=>$item4)
      <option {{(old('id_style',$model->id_style) == $key4) ? 'Selected' : ''}} value="{{$key4}}">{{$item4}}</option>
      @endforeach
      @endisset
    </select>
  </div>
</div>

<div  id="select2">
<div class="form-group row">
  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Pattern Code</label>
  <div class="col-sm-10">
    <input type="text" class="form-control @error('code') is-invalid @enderror"  name="code" placeholder="code" value="{{ old('code', $data->code??'' ) }}">
  </div>
</div>


<div class="form-group row">
  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Colour Code</label>
  <div class="col-sm-10">
    <input type="text" class="form-control @error('color') is-invalid @enderror" name="color" placeholder="color" value="{{ old('color', $data->color??'' ) }}">
  </div>
</div>
</div>


<div class="form-group row">
  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Type Fabric</label>
  <div class="col-sm-10">
    <select class="form-control text-light @error('id_material') is-invalid @enderror" id="id_material" name="id_material" value="{{ old('id_material', $model->id_material??'') }}">
      <option value="">- Default select -</option>
      @isset($material)
      @foreach ($material as $key4=>$item4)
      <option {{(old('id_material',$model->id_material) == $key4) ? 'Selected' : ''}} value="{{$key4}}">{{$item4}}</option>
      @endforeach
      @endisset
    </select>
  </div>
</div>


  
  <div class="mt-3 float-right">
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    <a class="btn btn-dark" href="{{ route('customer.index') }}">Cancel</a>
  </div>
</form>

@endsection

@section('scripts')
<script>

  $("#select1").change(function(){
 if($(this).val() == 14){
   $("#select2").show();
 }else{
   $("#select2").hide();
 }

 });

 </script>

@endsection