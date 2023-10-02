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
      <select class="form-control @error('material') is-invalid @enderror" 
      id="select-state" data-mdb-filter="true" name="material" value="{{ old('material') }}">
        <option>- Default select -</option>
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
        <select class="form-control @error('style') is-invalid @enderror" 
        id="style" name="style" value="{{ old('style') }}">
        <option>- Default select -</option>
        <option value="Baju Melayu Cekak Musang"> Baju Melayu Cekak Musang </option>
        <option value="Baju Melayu Teluk Belanga"> Baju Melayu Teluk Belanga </option>
      </select>
    </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>

  </div>
  </form>

</div>
@endsection