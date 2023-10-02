@extends('layout.app')


@section('content')

<div class="card">

  <div class="card-header">
    <h3 class="mb-0">Add Design</h3>
  </div>

<form method="post" action="{{ route('design.store') }}">
    @csrf

<div class="col-lg-11 ml-4 mt-3 mb-3">
    <div class="form-group">
        <label for="code">Code</label>
        <input type="text" class="form-control @error('code') is-invalid @enderror" 
        id="code" name="code" required autofocus readonly value="{{ $codes }}">
      </div>

    <div class="form-group">
      <label for="color">Colour</label>
      <input type="text" class="form-control @error('color') is-invalid @enderror" 
      id="color"  name="color" value="{{ old('color') }}">
    </div>

    <div class="form-group">
      <label for="material">Material</label>
      <select class="form-control" 
      id="material" name="material">
        <option value="">- Default select -</option>
        <option value="Cotton"> Cotton </option>
        <option value="Jacquard"> Jacquard </option>
        <option value="Crepe"> Crepe </option>
        <option value="Rayon"> Rayon </option>
        <option value="Chiffon"> Chiffon </option>
        <option value="Satin"> Satin </option>
      </select>
    </div>
    
    <div class="form-group">
        <label for="style">Style</label>
        <input list="browsers" id="style" name="style">
        <datalist class="form-control @error('style') is-invalid @enderror" 
         name="style" id="browsers">
        <option value="Baju Melayu Cekak Musang"> 
        <option value="Baju Melayu Teluk Belanga">
      </datalist> 
    </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>

  </div>
  </form>

</div>
@endsection

@section('scripts')
<script>
  $('#material').select2({
    width: '100%',
    placeholder: "Select an Option",
    allowClear: true
  });
</script>

@endsection