@extends('layout.main')


@section('content')


  <h4 class="card-title">Order</h4>
  <p class="card-description"> Edit Details  </p>
  
  <form class="forms-sample" method="post" action="{{ route('updatestatus', $data->order_id) }}">
    @csrf
    @method('put')
    
@include('order/form')
    
<div class="form-group row">
  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Status</label>
  <div class="col-sm-10">
    <select class="form-control text-light @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status', $data->status??'') }}">
      <option value="">- Default select -</option>
      
      <option {{(old('status',$data->status) == 1) ? 'Selected' : ''}} value="1">Completed</option>
      <option {{(old('status',$data->status) == 2) ? 'Selected' : ''}} value="2">Pending</option>
    </select>
  </div>
</div>

  
<div class="mt-3 float-right">
  <button type="submit" class="btn btn-primary mr-2">Submit</button>
  <a class="btn btn-dark" href="{{ route('order.index') }}">Cancel</a>
</div>
</form>



@endsection