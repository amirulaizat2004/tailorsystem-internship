@extends('layout.main')


@section('content')

<h4 class="card-title">Order</h4>
  <p class="card-description"> Edit Details  </p>
  
  <form id='formsample' class="forms-sample" method="post" action="{{ route('order.store') }}">
    @csrf

    <input name="meas_id" type="hidden" value="{{ $id??'' }}">
    @include('order/form')
  
   
    <input name="status" type="hidden" value="2">
        


    <div class="mt-3 float-right">
      <button type="button" data-statuscode='tambah' class="btnaction btn btn-primary mr-2">Add Another Order</button>
      <button type="button" data-statuscode='simpan' class="btnaction btn btn-primary mr-2">Submit</button>
      <a class="btn btn-dark" href="{{ route('order.index') }}">Cancel</a>
    </div>
    </form>

 


@endsection

@section('scripts')

<script>

  $('.btnaction').on('click', function (e) {

      e.preventDefault();
      var form = $('#formsample');

      var statuscode=$(this).data('statuscode');



var input = $("<input>")
             .attr("type", "hidden")
             .attr("name", "statuscode").val(statuscode);
             form.append(input);



      Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showDenyButton: true,
          titleColor: '#3085d6',
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



