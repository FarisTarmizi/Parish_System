
<div class="footer">
    <p>&copy; Masjid Ali-Imran. All rights reserved.</p>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        /*         $('#senarai').DataTable({
                  "paging": true,
                  "lengthChange": false,
                  "searching": false,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false,
                  "responsive": true,
                });  */
    });
</script>
<script>
    $(function () {
        $(".data-table").each(function() {
            $(this).DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["colvis"]
            }).buttons().container().appendTo($(this).parents('.card').find('.card-header .col-md-6:eq(0)'));
        });
    });
</script>
</body>
</html>

