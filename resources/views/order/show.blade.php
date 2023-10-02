@extends('layout.main')

@section('content')


<div class="card-header">
    <h4 class="mb-0">Customer</h4>
  </div>




<div class="form-group row mt-4">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Customer</label>
    <div class="col-sm-10">
        {{ $data->measurement->designs->customers->name??'' }}
    </div>
  </div>

  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        {{ $data->measurement->designs->customers->email??'' }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
        {{ $data->measurement->designs->customers->address??'' }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Contact</label>
    <div class="col-sm-10">
        {{ $data->measurement->designs->customers->no_phone??'' }}
    </div>
  </div>

  <div class="dropdown-divider"></div>

  <div class="card-header">
    <h4 class="mb-0">Design</h4>
  </div>


<div class="form-group row mt-4">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Choice</label>
    <div class="col-sm-10">
        {{ $data->measurement->designs->assetlookup3->description??'' }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Type of Clothing</label>
    <div class="col-sm-10">
        {{ $data->measurement->designs->assetlookup1->description??'' }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Type of Fabric</label>
    <div class="col-sm-10">
        {{ $data->measurement->designs->assetlookup->description??'' }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Pattern</label>
    <div class="col-sm-10">
        {{ $data->measurement->designs->code??'' }}
    </div>
  </div>

  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Colour</label>
    <div class="col-sm-10">
        {{ $data->measurement->designs->color??'' }}
    </div>
  </div>

  <div class="dropdown-divider"></div>

  <div class="card-header">
    <h4 class="mb-0">Measurement</h4>
  </div>

  
    <h6 class="mt-4 mb-0">Top</h6>
    <div class="dropdown-divider"></div>

  

  <div class="row mt-3">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Shoulder</label>
        <div class="col-sm-9">
          {{ $data->measurement->shoulder??'' }}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Sleeve</label>
        <div class="col-sm-9">
          {{ $data->measurement->sleeve??'' }}
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Chest</label>
        <div class="col-sm-9">
          {{ $data->measurement->chest??'' }}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Length</label>
        <div class="col-sm-9">
         {{ $data->measurement->length_top??'' }}
        </div>
      </div>
    </div>
  </div>

 



  <div class="row mt-3">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Waist</label>
        <div class="col-sm-9">
          {{ $data->measurement->waist_top??'' }}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Bottom</label>
        <div class="col-sm-9">
          {{ $data->measurement->bottom??'' }}
        </div>
      </div>
    </div>
  </div>


  <h6 class="mt-4 mb-0">Bottom</h6>
  <div class="dropdown-divider"></div>

<div class="row mt-3">
<div class="col-md-6">
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Waist</label>
    <div class="col-sm-9">
      {{ $data->measurement->waist??'' }}
    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Hip</label>
    <div class="col-sm-9">
    {{ $data->measurement->hip??'' }}
    </div>
  </div>
</div>
</div>

<div class="row mt-3">
<div class="col-md-6">
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Length</label>
    <div class="col-sm-9">
      {{ $data->measurement->length_bot??'' }}
    </div>
  </div>
</div>
</div>


<div class="dropdown-divider"></div>
  <div class="card-header">
    <h4 class="mb-0">Order</h4>
  </div>
  
<div class="form-group row mt-4">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Date</label>
    <div class="col-sm-10">
        {{ $data->date??'' }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Deadline</label>
    <div class="col-sm-10">
        {{ $data->deadline??'' }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Quantity</label>
    <div class="col-sm-10">
        {{ $data->quantity??'' }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
       RM {{ $data->price??'' }}
    </div>
  </div>

  <div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Total Price</label>
    <div class="col-sm-10">
        RM {{ $data->total??'' }}
    </div>
  </div>
   
  <div class="mt-3 float-right">
    <a class="btn btn-dark" href="{{ route('order.index') }}">Cancel</a>
  </div>

@endsection