 <!-- Jquery -->
 <script type="text/javascript" src="../public/js/jquery/jquery.min.js "></script>
 <!-- Jquerry UI -->
 <script type="text/javascript" src="../public/js/jquery-ui/jquery-ui.min.js "></script>
 <!-- Jquery Popper -->
 <script type="text/javascript" src="../public/js/popper.js/popper.min.js"></script>
 <!-- Bootstrap -->
 <script type="text/javascript" src="../public/js/bootstrap/js/bootstrap.min.js "></script>
 <!-- waves js -->
 <script src="../public/pages/waves/js/waves.min.js"></script>
 <!-- jquery slimscroll js -->
 <script type="text/javascript" src="../public/js/jquery-slimscroll/jquery.slimscroll.js"></script>
 <script type="text/javascript" src="../public/js/common-pages.js"></script>
 <!-- Custom Select 2 Bootsrap -->
 <script src="../public/plugins/select2/select2.min.js"></script>
 <script src="../public/plugins/select2/custom-select2.js"></script>
 <!-- slimscroll js -->
 <script src="../public/js/jquery.mCustomScrollbar.concat.min.js "></script>
 <!-- menu js -->
 <script src="../public/js/pcoded.min.js"></script>
 <script src="../public/js/vertical/vertical-layout.min.js "></script>

 <script type="text/javascript" src="../public/js/script.js "></script>
 <!-- Custom File  -->
 <script src="../public/js/bs-custom-file-input.min.js"></script>
 <script src="../public/plugins/bs-custom-file-input.min.js"></script>

 <!-- Data Tables  -->
 <script type="text/javascript" src="../public/plugins/Datatables/datatables.min.js"></script>
 <script>
     /* Init Feather Js */
     feather.replace()
     /* Init Custom Select */
     var ss = $(".basic").select2({
         tags: true,
     });
     /* Init Custom File Select */
     $(document).ready(function() {
         bsCustomFileInput.init();
     });
     /* Show Selected File Name */
     document.querySelector('.custom-file-input').addEventListener('change', function(e) {
         var fileName = document.getElementById("myInput").files[0].name;
         var nextSibling = e.target.nextElementSibling
         nextSibling.innerText = fileName
     })

     /* Stop Double Resubmission */
     if (window.history.replaceState) {
         window.history.replaceState(null, null, window.location.href);
     }
 </script>

 <script>
     function printContent(el) {
         var restorepage = $('body').html();
         var printcontent = $('#' + el).clone();
         $('body').empty().html(printcontent);
         window.print();
         $('body').html(restorepage);
     }
 </script>

 <script>
     /* Initialize Data Tables */
     $(document).ready(function() {
         $('.table').DataTable();
     });
     $("input[type='number']").inputSpinner()
 </script>
 <!-- Sweet Alerts -->
 <script src="../public/plugins/sweetalert2/sweetalert2.all.min.js"></script>
 <!-- Init Alerts -->
 <!-- Init Sweet Alerts -->
 <?php if (isset($success)) { ?>
     <!-- Pop Success Alert -->
     <script>
         Swal.fire({
             title: 'Success',
             html: '<?php echo $success; ?>',
             timer: 2500,
             type: "success",
             showConfirmButton: false,
             onBeforeOpen: () => {
                 timerInterval = setInterval(() => {
                     Swal.getContent().querySelector('strong')
                         .textContent = Swal.getTimerLeft()
                 }, 1000)
             },
             onClose: () => {
                 clearInterval(timerInterval)
             }
         }).then((result) => {
             if (result.dismiss === Swal.DismissReason.timer) {
                 console.log('<?php echo $success; ?>')
             }
         })
     </script>

 <?php }
    if (isset($err)) { ?>
     <script>
         Swal.fire({
             title: 'Failed',
             html: '<?php echo $err; ?>',
             timer: 2500,
             type: "error",
             showConfirmButton: false,
             onBeforeOpen: () => {
                 timerInterval = setInterval(() => {
                     Swal.getContent().querySelector('strong')
                         .textContent = Swal.getTimerLeft()
                 }, 1000)
             },
             onClose: () => {
                 clearInterval(timerInterval)
             }
         }).then((result) => {
             if (result.dismiss === Swal.DismissReason.timer) {
                 console.log('<?php echo $err; ?>')
             }
         })
     </script>

 <?php }
    if (isset($info)) { ?>
     <script>
         Swal.fire({
             title: 'Failed',
             html: '<?php echo $info; ?>',
             timer: 2500,
             type: "info",
             showConfirmButton: false,
             onBeforeOpen: () => {
                 timerInterval = setInterval(() => {
                     Swal.getContent().querySelector('strong')
                         .textContent = Swal.getTimerLeft()
                 }, 1000)
             },
             onClose: () => {
                 clearInterval(timerInterval)
             }
         }).then((result) => {
             if (result.dismiss === Swal.DismissReason.timer) {
                 console.log('<?php echo $info; ?>')
             }
         })
     </script>

 <?php }
    ?>