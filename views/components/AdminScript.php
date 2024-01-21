 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
     crossorigin="anonymous"></script><!-- jQuery UI 1.11.4 -->
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

 <!-- Bootstrap 5 -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
 </script>
 <!-- AdminLTE App -->
 <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <!--dataTables -->
 <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
 <!--select2 -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

 <script>
let table = new DataTable('#myTable');
 </script>

 <script>
$(document).ready(function() {
    $('#foodName').select2();
});
 </script>