 <!-- ============================================================== -->
 <!-- footer -->
 <!-- ============================================================== -->
 <footer class="footer text-center text-muted">
     All Rights Reserved &copy; 2021. Designed and Developed by <a href="https://ads4net.com">ADS4NET</a>.
 </footer>
 <!-- ============================================================== -->
 <!-- End footer -->
 <!-- ============================================================== -->
 </div>
 </div>
 <!-- ============================================================== -->
 <!-- End Wrapper -->

 <!-- All Jquery -->
 <!-- ============================================================== -->
 <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
 <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- apps -->
 <!-- apps -->
 <script src="dist/js/app-style-switcher.js"></script>
 <script src="dist/js/feather.min.js"></script>
 <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
 <script src="dist/js/sidebarmenu.js"></script>
 <!-- SweetAlert2 -->
 <script src="assets/extra-libs/sweetalert2/sweetalert2.min.js"></script>
 <!-- Toastr -->
 <script src="assets/extra-libs/toastr/toastr.min.js"></script>
 <!--Custom JavaScript -->
 <script src="dist/js/custom.min.js"></script>
 <!--This page JavaScript -->
 <script src="assets/extra-libs/c3/d3.min.js"></script>
 <script src="assets/extra-libs/c3/c3.min.js"></script>
 <script src="assets/libs/chartist/dist/chartist.min.js"></script>
 <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
 <script src="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
 <script src="assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
 <!-- <script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script> -->
 <!-- <script src="dist/js/pages/datatable/datatable-basic.init.js"></script> -->
 <script src="dist/js/examples.datatables.tabletools.js"></script>
 <script src="dist/js/pages/dashboards/dashboard1.min.js"></script>

 <!-- DataTables -->
 <script src="assets/datatables/jquery.dataTables.min.js"></script>
 <script src="assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="assets/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="assets/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
 <script src="assets/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
 <script src="assets/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
 <script src="assets/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
 <script src="assets/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
 <script src="assets/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
 <script src="assets/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>
 <script>
     $(document).ready(function() {

     });
 </script>
 <script>
     $(document).ready(function() {
         const Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000
         });
         <?php echo ($msg == 1) ? "Toast.fire({ icon: 'success', title: ' &nbsp; You have Successfully Upload Your Details.' });" : " ";
            echo ($msg == 2) ? "Toast.fire({ icon: 'success', title: ' You have Successfully Updated/Added Your Details.' });" : " ";
            echo ($msg == 3) ? "Toast.fire({ icon: 'success', title: '&nbsp; You have Successfully Generated Cards. !!!' });" : " ";
            echo ($msg == 4) ? "Toast.fire({ icon: 'success', title: ' &nbsp; You have Successfully Paid the Student Fees.' });" : " ";
            echo ($msg == 5) ? "Toast.fire({ icon: 'error', title: ' Invalid Details. Kindly Try Again' });" : " ";
            if ($msg == 6) {
                $print = "Toast.fire({ icon: 'error', title: ' The Following Issues Found <br> " . $error . " '});";
                echo $print;
            }
            echo ($msg == 7) ? "Toast.fire({ icon: 'success', title: ' You Have successfully Made a Request. Please Wait.' });" : " ";
            echo ($msg == 8) ? "Toast.fire({ icon: 'success', title: ' You Have successfully Change Your Password.' });" : " ";
            echo ($msg == 9) ? "Toast.fire({ icon: 'success', title: ' &nbsp; You have Successfully logged in to Your Account.' });" : " ";
            echo ($msg == 10) ? "Toast.fire({ icon: 'error', title: ' &nbsp; No Student Found For Marks Upload Or Already Uploaded Marks .' });" : " ";
            echo ($msg == 11) ? "Toast.fire({ icon: 'success', title: ' &nbsp;You Have successfully assign permission .' });" : " ";
            $msg = 0;
            ?>

         $('#reamount').change(function() {
             var reamt = $(this).val();
             var amt = $('#amount').val();
             if (reamt > 0 && amt > 0) {
                 if (reamt !== amt) {
                     $(this).val(0);
                     Toast.fire({
                         icon: 'error',
                         title: '&nbsp; Your Amount Mismatch !!!'
                     });
                 }
             } else {
                 $(this).val(0);
                 Toast.fire({
                     icon: 'error',
                     title: '&nbsp;Your Amount must be more than 500'
                 });
             }
         })
         $('#recourse').change(function() {
             var reamt = $(this).val();
             var amt = $('#course').val();
             if (reamt > 0 && amt > 0) {
                 if (reamt !== amt) {
                     $(this).val(0);
                     Toast.fire({
                         icon: 'error',
                         title: '&nbsp; Your course Name Mismatch !!!'
                     });
                 }
             }
         })

     });
 </script>
 <script>
     $(".custom-file-input").on("change", function(e) {
         var fileName = $(this).val().split("\\").pop();
         $(this).siblings("img").addClass("selected").html(fileName);
         var file = e.target.files[0].name;
         var file_size = e.target.files[0].size;
         var file_height = $(this).naturalHeight;
         var file_width = $(this).naturalWidth;
         var ext = file.substr((file.lastIndexOf('.') + 1));
         var arrayExtensions = ["png", "jpg", "jpeg"];
         if (arrayExtensions.lastIndexOf(ext) == -1) {
             alert("Please Select PNG | JPG | JPEG file only");
             $("#file1").val("");
         }
         if (file_size > 153600) {
             alert("Your File Size is Too High i.e. " + parseInt(file_size / 1024) + "kb");
             $("#file1").val("");
         }
     });

     function next2date() {
         var tt = $('#ad_date').val();
         var am = $('option:selected', '#listcertificate').attr('duration');
         $('#pr_duration').append('<input type="hidden" name="p_dur" value ="' + am + '" >');
         var date = new Date(tt);
         date.setDate(date.getDate() + parseInt(p_duration(am)));

         var dd = date.getDate();
         var mm = date.getMonth();
         var yy = date.getFullYear();
         $('#end_date').val(mm + 1 + '/' + dd + '/' + yy);
     }

     function next2fees() {
         var am = $('option:selected', '#listcertificate').attr('fees');
         var con = $('option:selected', '#listcertificate').attr('course_name');
         var cod = $('option:selected', '#listcertificate').attr('duration');
         $('#course_fees').html(' Fees <i class="fas fa-rupee-sign"></i>' + am);
         $('#courseName').val(con);
         $('#coursedur').val(cod);
     }

     $('#cpassword').change({
         id: 'password'
     }, equality);

     function equality($getid) {
         $post = $(this);
         if ($("#" + $getid.data.id).val() !== $(this).val()) {
             $post.val("");
             $post.removeClass('is-valid');
             $post.addClass('is-invalid');
             $post.after('<label id="cpass-error" class="error" for="cpass">' + $getid.data.id + ' Does not match.</label>');
         } else {

             $(".error").remove();
             $post.removeClass('is-invalid');
             $post.addClass('is-valid');
         }
     }
 </script>
 </body>

 </html>