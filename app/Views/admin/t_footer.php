<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/admin/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/admin/js/demo.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('#loker').DataTable({
            responsive: true,
            "lengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, "All"]
            ]
        });
    });
    $(document).ready(function() {
        $('#lokersmg').DataTable({
            responsive: true,
            "lengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, "All"]
            ]
        });
    });
    $(document).ready(function() {
        $('#lokerjkt').DataTable({
            responsive: true,
            "lengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, "All"]
            ]
        });
    });

    $(document).ready(function() {
        $('#pelamar').DataTable({
            responsive: true,
            "lengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, "All"]
            ]
        });
    });

    CKEDITOR.replace('editor1');

    $(document).ready(function() {

        $.fn.modal.Constructor.prototype.enforceFocus = function() {
            modal_this = this
            $(document).on('focusin.modal', function(e) {
                if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length
                    // add whatever conditions you need here:
                    &&
                    !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                    modal_this.$element.focus()
                }
            })
        };

    });
</script>
</body>

</html>