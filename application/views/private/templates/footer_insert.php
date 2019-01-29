
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright &copy <b>Sintrilpomed</b> <?php echo date("Y");?> -  Develop by <a href="https://www.instagram.com/fadlytanjung_/">MFT</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- <script>
      $(function() { 
        $('#dateaja').datetimepicker({format : "DD-MMM-YYYY"});
      });
    </script> -->

   <!--  <script>
        $(document).ready(function() {
        $("#inputN").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                 // Allow: Ctrl/cmd+A
                (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                 // Allow: Ctrl/cmd+C
                (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                 // Allow: Ctrl/cmd+X
                (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                 // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                     // let it happen, don't do anything
                     return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
    });
});

    </script> -->
    <!-- jQuery -->
    <script src="<?=base_url('assets/vendors/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?=base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/vendors/fastclick/lib/fastclick.js')?>"></script>
    <!-- NProgress -->
    <script src="<?=base_url('assets/vendors/nprogress/nprogress.js')?>"></script>
    <!-- validator -->
    <script src="<?=base_url('assets/vendors/validator/validator.js')?>"></script>

     <!-- jQuery custom content scroller -->
    <script src="<?=base_url('assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')?>"></script>
  
    <!-- iCheck -->
    <script src="<?=base_url('assets/vendors/iCheck/icheck.min.js')?>"></script>
    
    <!-- bootstrap-daterangepicker -->
    <script src="<?=base_url('assets/vendors/moment/min/moment.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?=base_url('assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?=base_url('assets/build/js/custom.min.js')?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $("#dateaja").daterangepicker({
          singleDatePicker: true,
          locale: {
                format: 'DD-MMM-YYYY'
          }
        });
      });
    </script>
    <script type="text/javascript">

    </script>
  </body>
</html>
