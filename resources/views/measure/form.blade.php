
    
      <div class="card-header">
        <h6 class="mb-0">Top</h6>
      </div>

      

      <div class="row mt-3">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Shoulder</label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('shoulder') is-invalid @enderror" 
              id="shoulder"  name="shoulder" value="{{ $data->shoulder??'' }}" />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Sleeve</label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('sleeve') is-invalid @enderror" 
              id="sleeve"  name="sleeve" value="{{ $data->sleeve??'' }}" />
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Chest</label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('chest') is-invalid @enderror" 
              id="chest"  name="chest" value="{{ $data->chest??'' }}" />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Length</label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('length_top') is-invalid @enderror" 
              id="length_top"  name="length_top" value="{{ $data->length_top??'' }}" />
            </div>
          </div>
        </div>
      </div>

     


    @if ($model==null)
    
    @if ($data->designs->assetlookup1->code=='lelaki')
        
    @else
      <div class="row mt-3">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Waist</label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('waist_top') is-invalid @enderror" 
              id="waist_top"  name="waist_top" value="{{ $data->waist_top??'' }}" />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Bottom</label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('bottom') is-invalid @enderror" 
              id="bottom"  name="bottom" value="{{ $data->bottom??'' }}" />
            </div>
          </div>
        </div>
      </div>
    @endif

    @elseif ($model->assetlookup1->code=='lelaki')
        
    @else
    <div class="row mt-3">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Waist</label>
          <div class="col-sm-9">
            <input type="text" class="form-control @error('waist_top') is-invalid @enderror" 
            id="waist_top"  name="waist_top" value="{{ $data->waist_top??'' }}" />
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Bottom</label>
          <div class="col-sm-9">
            <input type="text" class="form-control @error('bottom') is-invalid @enderror" 
            id="bottom"  name="bottom" value="{{ $data->bottom??'' }}" />
          </div>
        </div>
      </div>
    </div>
    

    @endif


  <div class="card-header mt-3">
    <h6 class="mb-0">Bottom</h6>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Waist</label>
        <div class="col-sm-9">
          <input type="text" class="form-control @error('waist') is-invalid @enderror" 
          id="waist"  name="waist" value="{{ $data->waist??'' }}" />
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Hip</label>
        <div class="col-sm-9">
          <input type="text" class="form-control @error('hip') is-invalid @enderror" 
          id="hip"  name="hip" value="{{ $data->hip??'' }}" />
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Length</label>
        <div class="col-sm-9">
          <input type="text" class="form-control @error('length_bot') is-invalid @enderror" 
          id="length_bot"  name="length_bot" value="{{ $data->length_bot??'' }}" />
        </div>
      </div>
    </div>
  </div>

  