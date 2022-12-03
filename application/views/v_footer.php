  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 PT.X</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url('js/adminlte.js'); ?>"></script>

<!-- OPTIONAL SCRIPTS -->

<!-- Select2 -->
<script src="<?php echo base_url('plugins/select2/js/select2.full.min.js'); ?>"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js'); ?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('plugins/moment/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/inputmask/jquery.inputmask.min.js'); ?>></script>
<!-- date-range-picker -->
<script src="<?php echo base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js'); ?>"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/jszip/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/pdfmake/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/pdfmake/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>

<!-- jquery-validation -->
<script src="<?php echo base_url('plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/jquery-validation/additional-methods.min.js'); ?>"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>

<script src="<?php echo base_url('js/demo.js'); ?>"></script>

<script>
  $(document).ready(function() {
    $('input').attr('autocomplete','off');
    
     $(window).keydown(function(event){
        if(event.keyCode == 13 ) {
          event.preventDefault();
          return false;
        }
      });
<?php if(isset($js)) { echo $js; } ?>
  }); 
</script>
</body>
</html>
