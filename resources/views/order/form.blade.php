

<div class="form-group row">
  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Date</label>
  <div class="col-sm-10">
    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" placeholder="date" value="{{ old('date', $data->date??'' ) }}">
  </div>
</div>
      
<div class="form-group row">
  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Deadline</label>
  <div class="col-sm-10">
    <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" placeholder="deadline" value="{{ old('deadline', $data->deadline??'' ) }}">
  </div>
</div>

<div class="form-group row">
  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Quantity</label>
  <div class="col-sm-10">
    <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="quantity" value="{{ old('quantity', $data->quantity??'' ) }}">
  </div>
</div>

<div class="form-group row">
  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Price</label>
  <div class="col-sm-10">
    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="price" value="{{ old('price', $data->price??'' ) }}">
  </div>
</div>


     
      
    