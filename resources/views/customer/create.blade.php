@extends('layout.main')


@section('content')

<h4 class="card-title">Customer</h4>
<p class="card-description"> Add New  </p>

<form class="forms-sample" method="post" action="{{ route('customer.store') }}">
    @csrf

    @include('customer/form')
  
  <div class="mt-3 float-right">
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    <a class="btn btn-dark" href="{{ route('customer.index') }}">Cancel</a>
  </div>
</form>


@endsection