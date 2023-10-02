

@extends('layout.main')


@section('content')


<h4 class="card-title">Design</h4>
<p class="card-description"> Add New  </p>

<form class="forms-sample" method="post" action="{{ route('design.store') }}">
    @csrf

    <input name="cust_id" type="hidden" value="{{ $id??'' }} ">
  @include('design/form')
  
  <div class="mt-3 float-right">
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    <a class="btn btn-dark" href="{{ route('customer.index') }}">Cancel</a>
  </div>
</form>

@endsection

@section('scripts')


@endsection