@php
    use App\Helpers\BankStatusHelper;
@endphp
@extends('layout.main')

@section('dashboard')

<div class="col-13 grid-margin stretch-card">
    <div class="card">
      
      <div class="card-body">
        <h4 class="card-title">Search</h4>

        <form >
            @csrf

            <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Choice</label>
                <div class="col-sm-10">
                  <select id='id-choice' class="form-control text-light @error('choice') is-invalid @enderror"  name="choice">
                    <option value="">- Default select -</option>
                    @isset($pilihan)
                    @foreach ($pilihan as $key4=>$item4)
                    <option {{(old('choice',$model->choice) == $key4) ? 'Selected' : ''}} value="{{$key4}}">{{$item4}}</option>
                    @endforeach
                    @endisset
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Material</label>
                <div class="col-sm-10">
                  <select id='id-id_material' class="form-control text-light @error('id_material') is-invalid @enderror"  name="id_material">
                    <option value="">- Default select -</option>
                    @isset($material)
                    @foreach ($material as $key4=>$item4)
                    <option {{(old('id_material',$model->id_material) == $key4) ? 'Selected' : ''}} value="{{$key4}}">{{$item4}}</option>
                    @endforeach
                    @endisset
                  </select>
                </div>
              </div>

          <div class="mt-3 float-right">
            <button class="btn btn-primary mr-2">Search</button>
            
          </div>
        </form>

      </div>
    </div>
  </div>
  
@endsection


@section('content')

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

@if(session()->has('danger'))
<div class="alert alert-danger" role="alert">
    {{ session('danger') }}
</div>
@endif

@php
$bill=BankStatusHelper::countFrom($data);
@endphp

{{-- <div class="float-right">
    <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" href="{{ route('design.create') }}">+ New Design</a>
</div> --}}
        <h4 class="card-title">Design</h4>
        
                    <p class="card-description"> List of customers
                    </p>
        
            <div class="table-responsive">
          
                <table id="datatable" class="table ">
                    <thead class="thead-light">
              <tr>
                    <th>Bil.</th>
                    <th>Choice</th>
                    <th>Pattern</th>
                    <th>Colour</th>
                    <th>material</th>
                    <th>clothing</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>
@foreach ($data as $item)
    <tr>
        <td>{{ ++$bill }}</td>
        <td>
            {{ $item->assetlookup3->description??'' }}
        </td>
        <td>
            {{ $item->code??'' }}
        </td>
        <td>
            {{ $item->color??'' }}
        </td>
        <td>
            {{ $item->assetlookup->description ??''}}
        </td>
        <td>
            {{ $item->assetlookup1->description??'' }}
        </td>
        <td class="d-inline-flex">

            <a href="{{ route('design.show',$item->id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i></a href="">
          
            <a href="{{ route('design.edit',$item->id) }}" class="btn btn-info btn-sm ml-1"><i class="mdi mdi-lead-pencil"></i></a>
            

            <form action="{{ route('design.destroy',['design'=>$item->id]) }}" method="post" class="d-inline">
                @method('delete')
                @csrf

                <button id="btndelete" class="btn btn-danger btn-sm ml-1" ><i class="mdi mdi-delete"></i></button>

            </form>
        </td>
    </tr>
              
    @endforeach
            
              
</tbody>
</table>
<br>
{{ $data->appends(Request::all())->links();}}
</div>
    
@endsection