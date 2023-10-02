@extends('layout.main')

@section('content')

<h4 class="card-title">Design</h4>
<p class="card-description"> Edit information  </p>

  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('design.update', $model->id) }}">
    @csrf 
    @method('put')

    @include('design/form')

    <div class="mt-3 float-right">
      <button type="submit" class="btn btn-primary mr-2">Submit</button>
      <a class="btn btn-dark" href="{{ route('design.index') }}">Cancel</a>
    </div>
  </form>

  

@endsection

