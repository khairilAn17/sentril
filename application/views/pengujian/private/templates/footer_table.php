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
     <!-- jQuery -->
    <script src="<?=base_url('assets/vendors/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?=base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/vendors/fastclick/lib/fastclick.js')?>"></script>
    <!-- NProgress -->
    <script src="<?=base_url('assets/vendors/nprogress/nprogress.js')?>"></script>
    <!-- jQuery custom content scroller -->
    <script src="<?=base_url('assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')?>"></script>
  
    <!-- iCheck -->
    <script src="<?=base_url('assets/vendors/iCheck/icheck.min.js')?>"></script>
    <!-- Datatables -->
    <script src="<?=base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/jszip/dist/jszip.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/pdfmake/build/pdfmake.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/pdfmake/build/vfs_fonts.js')?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?=base_url('assets/build/js/custom.min.js')?>"></script>
    <!-- <script>
       function archiveFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the for
        swal({
          title: "Are you sure?",
          text: "But you will still be able to retrieve this file.",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, archive it!",
          cancelButtonText: "No, cancel please!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){   
          if (isConfirm) 
            {     
              swal("Deleted!", "Your file has been deleted.", "success");   
            } 

          else
            {     
              swal("Cancelled", "Your file is safe", "error");   
            }
          });
        }
    </script> -->
  </body> 
</html>