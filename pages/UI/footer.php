<!-- jQuery 2.2.0 -->
<script src="<?= PATH_COMPLEMENTO ?>plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= PATH_COMPLEMENTO ?>https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= PATH_COMPLEMENTO ?>bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= PATH_COMPLEMENTO ?>https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?= PATH_COMPLEMENTO ?>plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= PATH_COMPLEMENTO ?>plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= PATH_COMPLEMENTO ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= PATH_COMPLEMENTO ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= PATH_COMPLEMENTO ?>plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="<?= PATH_COMPLEMENTO ?>https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?= PATH_COMPLEMENTO ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= PATH_COMPLEMENTO ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= PATH_COMPLEMENTO ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= PATH_COMPLEMENTO ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= PATH_COMPLEMENTO ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= PATH_COMPLEMENTO ?>dist/js/app.min.js"></script>
<script src="<?= PATH_COMPLEMENTO ?>dist/js/generales.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= PATH_COMPLEMENTO ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= PATH_COMPLEMENTO ?>dist/js/demo.js"></script>
<!-- iCheck -->
<script src="<?= PATH_COMPLEMENTO ?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>



<!-- DataTables -->
<script src="<?= PATH_COMPLEMENTO ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= PATH_COMPLEMENTO ?>plugins/datatables/dataTables.bootstrap.min.js"></script>

</html>
