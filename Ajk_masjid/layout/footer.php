<div class="footer">
    <p>&copy;Masjid Ali-Imran. All rights reserved.</p>
</div>
<!-- jQuery -->
<script src="assets_template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets_template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Bootstrap 4 -->
<script src="assets_template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="assets_template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets_template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets_template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets_template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets_template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets_template/plugins/moment/moment.min.js"></script>
<script src="assets_template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets_template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets_template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets_template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets_template/dist/js/adminlte.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets_template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets_template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets_template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets_template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets_template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets_template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets_template/plugins/jszip/jszip.min.js"></script>
<script src="assets_template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets_template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets_template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets_template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets_template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["colvis", "excel"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $("#example2").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["colvis", "excel"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        $("#example3").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["colvis", "excel"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>
<script>
    $(function () {
        $(".data-table").each(function() {
            $(this).DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["colvis", "excel"]
            }).buttons().container().appendTo($(this).parents('.card').find('.card-header .col-md-6:eq(0)'));
        });
    });
</script>
</body>
</html>
