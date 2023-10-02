<div class="form-group row">
  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Name</label>
  <div class="col-sm-10">
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name', $data->name??'' ) }}">
  </div>
</div>

<div class="form-group row">
  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Email</label>
  <div class="col-sm-10">
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"  name="email" value="{{ old('email', $data->email??'' ) }}" placeholder="Email">
  </div>
</div>

<div class="form-group row">
  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Address</label>
  <div class="col-sm-10">
    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"  name="address" value="{{ old('address', $data->address??'' ) }}" placeholder="Address">
  </div>
</div>

<div class="form-group row">
  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Contact</label>
  <div class="col-sm-10">
    <input type="text" class="form-control @error('no_phone') is-invalid @enderror" id="no_phone"  name="no_phone" value="{{ old('no_phone', $data->no_phone??'' ) }}" placeholder="No. Phone">
  </div>
</div>
 