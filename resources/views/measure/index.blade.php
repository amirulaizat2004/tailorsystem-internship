@php
    use App\Helpers\BankStatusHelper;
@endphp

@extends('layout.main')


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
    <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" href="{{ route('measure.create') }}">+ New Measurement</a>
</div> --}}
        <h4 class="card-title">Measurement</h4>
        
                    <p class="card-description"> List of measurements
                    </p>
        
            <div class="table-responsive">
          
                <table id="datatable" class="table ">
                    <thead class="thead-light">
    <tr>
        <th>No.</th>
        <th>Shoulder</th>
        <th>Sleeve</th>
        <th>Chest</th>
        <th>Length Top</th>
        <th>Waist Top</th>
        <th>Bottom</th>
        <th>Hip</th>
        <th>Length Bot</th>
        <th>Waist</th>
        
        <th>Action</th>
    </tr>
    </thead>

    <tbody>
@foreach ($data as $item)
    <tr>
        <td>{{ ++$bill}}</td>
        <td>
            {{ $item->shoulder??'' }}
        </td>
        <td>
            {{ $item->sleeve??'' }}
        </td>
        <td>
            {{ $item->chest??'' }}
        </td>
        <td>
            {{ $item->length_top??'' }}
        </td>
        <td>
            {{ $item->waist_top??'' }}
        </td>
        <td>
            {{ $item->bottom??'' }}
        </td>
        <td>
            {{ $item->hip??'' }}
        </td>
        <td>
            {{ $item->length_bot??'' }}
        </td>
        <td>
            {{ $item->waist??'' }}
        </td>
        
        <td class="d-inline-flex">

            <a href="{{ route('measure.show',$item->measure_id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i></a href="">
          
                <a href="{{ route('measure.edit',$item->measure_id) }}" class="btn btn-info btn-sm ml-1"><i class="mdi mdi-lead-pencil"></i></a>
            
            <form action="{{ route('measure.destroy',['measure'=>$item->measure_id]) }}" method="post" class="d-inline">
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

