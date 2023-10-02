@extends('layout.main')


@section('content')


<h4 class="card-title">Measurement</h4>
<p class="card-description"> Measurement for <b>{{ $model->assetlookup1->description }}</b>  </p>

<form class="forms-sample" action="{{ route('measurestore') }}" method="post">
    @csrf

    <input name="design_id" type="hidden" value="{{ $id??'' }} ">
    @include('measure/form')
    
  
    <div class="mt-3 float-right">
      <button type="submit" class="btn btn-primary mr-2">Submit</button>
      <a class="btn btn-dark" href="{{ route('measure.index') }}">Cancel</a>
    </div>
  </form>


@endsection