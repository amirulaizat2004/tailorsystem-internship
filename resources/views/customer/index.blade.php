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
            <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{request()->input('name')??''}}">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email"  name="email" value="{{request()->input('email')??''}}" placeholder="Email">
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


<div class="float-right">
    <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" href="{{ route('customer.create') }}">+ New Customer</a>
</div>
        <h4 class="card-title">Customer</h4>
        
                    <p class="card-description"> List of customers
                    </p>
        
            <div class="table-responsive">
          
          <table id="datatable" class="table ">
            <thead class="thead-light">
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                {{-- <th>Address</th> --}}
                <th>Phone No.</th>
                <th>Action</th>
              </tr>
            </thead>


            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ ++$bill }}</td>
                    <td>
                        {{ $item->name??'' }}
                    </td>
                    <td>
                        {{ $item->email??'' }}
                    </td>
                    {{-- <td>
                        {{ $item->address??'' }}
                    </td> --}}
                    <td>
                        {{ $item->no_phone??''}}
                    </td>
                    <td >
                    <div class="d-inline-flex">

                        <a href="{{ route('customer.show',$item->cust_id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i></a href="">
          
                        <a href="{{ route('customer.edit',$item->cust_id) }}" class="btn btn-info btn-sm ml-1"><i class="mdi mdi-lead-pencil"></i></a>
            
                        <form  id='formdelete' action="{{ route('customer.destroy',['customer'=>$item->cust_id]) }}" method="post">
                            @method('delete')
                            @csrf
            
                            <button  class="btndelete btn btn-danger btn-sm ml-1" ><i class="mdi mdi-delete"></i></button>
            
                        </form>
            
                            <a href="{{ route('designcreate',$item->cust_id) }}" class="btn btn-success btn-sm ml-1"><i class="mdi mdi-plus-circle"></i></a>
                            
                    </div>
                    </td>
                </tr>
            
            @endforeach

            </tbody>
          </table>
          <br>
          {{ $data->appends(Request::all())->links();}}
  </div>
     
 



@endsection

@section('scripts')
    <script>

$('.btndelete').on('click', function (e) {

e.preventDefault();
var form = $('#formdelete');

Swal.fire({
    title: 'Adakah anda Pasti',
    text: "",
    icon: 'warning',
    showDenyButton: true,
    // showCancelButton: true,
    confirmButtonText: 'YA',
    denyButtonText: `Tidak`,
}).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
        form.submit();

        Swal.fire({
            title: 'Dalam Proses',
            icon: 'warning',
            html: '<div class="spinner-grow text-primary" role="status"></div>',
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false
        })



    } else if (result.isDenied) {
        Swal.fire('Changes are not saved', '', 'info')
    }
})
});
    </script>
@endsection