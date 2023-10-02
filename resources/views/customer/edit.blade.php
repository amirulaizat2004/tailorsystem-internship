@extends('layout.main')

  @section('content')

  <h4 class="card-title">Customer</h4>
  <p class="card-description"> Edit information  </p>

  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('customer.update', $data->cust_id) }}">
    @csrf 
    @method('put')

    @include('customer/form')


    <div class="mt-3 float-right">
      <button type="submit" class="btn btn-primary mr-2">Submit</button>
      <button class="btn btn-dark">Cancel</button>
    </div>
  </form>

@endsection