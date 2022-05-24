<!-- Bundle CSS -->
<script src="../public/js/bundle.js?ver=1.4.0"></script>
<!-- Main CSS -->
<script src="../public/js/scripts.js?ver=1.4.0"></script>
<!-- Load Spinnners -->
<script src="../public/js/libs/spinner/bootstrap-number-input.js"></script>
<!-- Load Alerts -->
<script src="../public/js/libs/toastr/toastr.min.js"></script>
<!-- Init  Alerts -->
<?php if (isset($success)) { ?>
    <!-- Pop Success Alert -->
    <script>
        toastr.success("<?php echo $success; ?>", "", {
            positionClass: "toast-top-center",
            timeOut: 4e3,
            onclick: null,
            showDuration: "200",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        })
    </script>

<?php }
if (isset($err)) { ?>
    <script>
        toastr.error("<?php echo $err; ?>", "", {
            positionClass: "toast-top-center",
            timeOut: 5e3,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        })
    </script>
<?php }
if (isset($info)) { ?>
    <script>
        toastr.warning("<?php echo $info; ?>", "", {
            positionClass: "toast-top-center",
            timeOut: 5e3,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        })
    </script>
<?php }
?>
<script>
    /* Stop Double Resubmission */
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<script>
    $('#number_entry').bootstrapNumber({
        upClass: 'success',
        downClass: 'danger'
    });
</script>