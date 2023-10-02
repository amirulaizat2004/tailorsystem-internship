@php
    use App\Helpers\BankStatusHelper;
@endphp


@extends('layout.main')

@section('dashboard')

<div class="row">
  <div class="col-sm-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h5>Customers</h5>
        <div class="row">
          <div class="col-8 col-sm-12 col-xl-8 my-auto">
            <div class="d-flex d-sm-block d-md-flex align-items-center">
              <h2 class="mb-0">{{ $model->count()??'' }}</h2>
              <p class="text-success ml-2 mb-0 font-weight-medium">total</p>
            </div>
            {{-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> --}}
          </div>
          <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
            <i class="icon-lg mdi mdi-account-multiple-outline text-primary ml-auto"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h5>Orders</h5>
        <div class="row">
          <div class="col-8 col-sm-12 col-xl-8 my-auto">
            <div class="d-flex d-sm-block d-md-flex align-items-center">
              <h2 class="mb-0">{{ $models->count()??'' }}</h2>
              <p class="text-success ml-2 mb-0 font-weight-medium">total</p>
            </div>
            {{-- <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6> --}}
          </div>
          <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
            <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h5>Sales</h5>
        <div class="row">
          <div class="col-8 col-sm-12 col-xl-8 my-auto">
            <div class="d-flex d-sm-block d-md-flex align-items-center">
              <p class="sm">RM</p>
              <h2 class="mb-0"> {{ $models->sum('total')??'' }}</h2>
              <p class="text-success ml-2 mb-0 font-weight-medium">total </p>
            </div>
            {{-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> --}}
          </div>
          <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
            <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('content')

@php
$bill=BankStatusHelper::countFrom($data);
@endphp

<h4 class="card-title">Order Status</h4>
        
                    <p class="card-description"> List of order status
                    </p>
        
            <div class="table-responsive">
          
          <table id="datatable" class="table ">
            <thead class="thead-light">
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Clothing</th>
                {{-- <th>Date</th> --}}
                
                <th>Deadline</th>
                <th>Remaining Day</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>


            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ ++$bill }}</td>
                    <td>
                        {{ $item->measurement->designs->customers->name??'' }}
                    </td>
                    <td>
                      {{ $item->measurement->designs->assetlookup1->description??'' }}
                  </td>
                    {{-- <td>
                        {{ $item->date??'' }}
                    </td> --}}
                    
                    <td>
                      @php
                        
                        $newDate = \Carbon\Carbon::createFromFormat('Y-m-d', $item->deadline)->format('d M Y');
                      @endphp
                        {{ $newDate??''}}
                    </td>
                    
                    <td>
                      @php
                        $fdate = Carbon\Carbon::now();
                        $tdate = $item->deadline;
                        $datetime1 = new DateTime($fdate);
                        $datetime2 = new DateTime($tdate);
                        $interval = $datetime1->diff($datetime2);
                        $days = $interval->format('%a');
                      @endphp
                      @if ($days <= '3')
                      <p style="color:red;" class="mb-0">{{$days}} Days</p>
                      @elseif ($days >= '4')
                      {{$days}} Days
                      @endif
                    </td>
                    <td>
                      @if ($item->status == '1')
                      <a class="btn-success btn-sm">Completed</a>
                      @else
                      <a class="btn-danger btn-sm">Pending</a>
                      @endif
                  </td>
                    <td >
                      @if ($item->status == '1')
                     
                      @else
                      {{-- <a class="btn btn-sm btn-info mb-2" href="{{ route('orderstatus', ) }}">
                        <i class="mdi mdi-check-circle"></i>
                      </a>  --}}

                      <a href="{{ route('orderstatus',$item->order_id) }}" class="btn btn-info btn-sm ml-1"><i class="mdi mdi-lead-pencil"></i></a>

                     
                      @endif
                        
                    </td>
                </tr>
            
            @endforeach

            </tbody>
          </table>
          <br>
          {{ $data->appends(Request::all())->links();}}
  </div>



@endsection