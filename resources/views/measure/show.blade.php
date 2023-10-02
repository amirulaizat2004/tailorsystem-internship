@extends('layout.main')

@section('content')


    
<div class="card-header">
    <h6 class="mb-0">Top</h6>
  </div>

  

  <div class="row mt-3">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Shoulder</label>
        <div class="col-sm-9">
          {{ $data->shoulder??'' }}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Sleeve</label>
        <div class="col-sm-9">
          {{ $data->sleeve??'' }}
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Chest</label>
        <div class="col-sm-9">
          {{ $data->chest??'' }}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Length</label>
        <div class="col-sm-9">
         {{ $data->length_top??'' }}
        </div>
      </div>
    </div>
  </div>

 



  <div class="row mt-3">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Waist</label>
        <div class="col-sm-9">
          {{ $data->waist_top??'' }}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Bottom</label>
        <div class="col-sm-9">
          {{ $data->bottom??'' }}
        </div>
      </div>
    </div>
  </div>





<div class="card-header mt-3">
<h6 class="mb-0">Bottom</h6>
</div>

<div class="row mt-3">
<div class="col-md-6">
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Waist</label>
    <div class="col-sm-9">
      {{ $data->waist??'' }}
    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Hip</label>
    <div class="col-sm-9">
    {{ $data->hip??'' }}
    </div>
  </div>
</div>
</div>

<div class="row mt-3">
<div class="col-md-6">
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Length</label>
    <div class="col-sm-9">
      {{ $data->length_bot??'' }}
    </div>
  </div>
</div>
</div>
<div class="mt-3 float-right">
    <a class="btn btn-dark" href="{{ route('measure.index') }}">Cancel</a>
  </div>

@endsection