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
            <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="date" name="date" placeholder="date" value="{{request()->input('date')??''}}">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Deadline</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="deadline" name="deadline" placeholder="deadline" value="{{request()->input('deadline')??''}}">
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
$bill=BankStatusHelper::countFrom($orders);
@endphp

{{-- <div class="float-right">
    <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" href="{{ route('order.create') }}">+ New Order</a>
</div> --}}
        <h4 class="card-title">Orders</h4>
        
                    <p class="card-description"> List of Orders
                    </p>
        
            <div class="table-responsive">
          
          <table id="datatable" class="table ">
            <thead class="thead-light">
    <tr>
        <th>Bil</th>
        <th>Date</th>
        <th>Deadline</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>

<tbody>
@foreach ($orders as $item)
    <tr>
        <td>{{ ++$bill }}</td>
        <td>
          @php
          $newDate = \Carbon\Carbon::createFromFormat('Y-m-d', $item->date)->format('d M Y');
            @endphp
            {{ $newDate??''}}

          
        </td>
        <td>

          @php
                        
            $newDate = \Carbon\Carbon::createFromFormat('Y-m-d', $item->deadline)->format('d M Y');
            @endphp
            {{ $newDate??''}}
       
        </td>
        <td>
            {{ $item->quantity??'' }}
        </td>
        <td>
            RM {{ $item->price??'' }}
        </td>
        <td>
            RM {{ $item->total??'' }}
        </td>
        <td>
            @if ($item->status == '1')
            <a class="btn-success btn-sm">Completed</a>
            @else
            <a class="btn-danger btn-sm">Pending</a>
            @endif
        </td>
        <td class="d-inline-flex">

            <a href="{{ route('ordershow',$item->order_id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i></a href="">
          
            <a href="{{ route('order.edit',$item->order_id) }}" class="btn btn-info btn-sm ml-1"><i class="mdi mdi-lead-pencil"></i></a>

            <form action="{{ route('order.destroy',['order'=>$item->order_id]) }}" method="post" class="d-inline">
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
{{ $orders->appends(Request::all())->links();}}
</div>
@endsection