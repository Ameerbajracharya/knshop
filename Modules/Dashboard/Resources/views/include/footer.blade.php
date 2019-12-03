<script>
    $('.delete').on('click', function() {
        return confirm("Are You Sure You Want To Delete?");
    });
</script>
<!-- jQuery -->
<script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('public/backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset('public/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>

 
<script>
  $(function () {
    $('#example1').DataTable()
   })
</script>


<script>
    toastr.options = {
        "debug": false,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "fadeIn": 300,
        "fadeOut": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000
    }

    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
    @endif

    @if(Session::has('warning'))
    toastr.error("{{Session::get('warning')}}");
    @endif


</script>

<script>
    $('#logout').on('click', function() {
        return confirm("Are You Sure You Want To Logout?");
    });
</script>

{{-- <script>
    $('#delete').on('click', function() {
        return confirm("Are You Sure You Want To Delete?");
    });
</script> --}}

<script type="text/javascript">

    function checkForm(form)
    {
        //
        // validate form fields
        //

        form.myButton.disabled = true;
        return true;
    }

</script>
<script type="text/javascript">
    function toggle_check(){
      let checkboxes = document.getElementsByName('permission[]');
      let button = document.getElementById('toggle');
      if(button.value == 'Check all'){
        for(let i in checkboxes){
          checkboxes[i].checked = 'FALSE';
        }
        button.value = 'Uncheck';
      }
      else{
        for(let i in checkboxes){
          checkboxes[i].checked = '';
        }
        button.value = 'Check all';
      }
    }
</script>
