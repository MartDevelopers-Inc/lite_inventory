<!-- Bootstrap -->
<script src="../public/js/bootstrap.bundle.min.js"></script>
<!-- Jquerry -->
<script src="../public/js/jquery.min.js"></script>
<!-- Custom Show / Hide Password -->
<script src="../public/js/show-hide-password.js"></script>
<!-- Cookies Theme Switcher -->
<script src="../public/js/cookies-theme-switcher.js"></script>
<!-- Mentis Menu -->
<script src="../public/js/libs/metismenu/metisMenu.min.js"></script>
<!-- Slick Min -->
<script src="../public/js/libs/slick/slick.min.js"></script>
<!-- Index Sliders -->
<script src="../public/js/index.js"></script>
<!-- Application Loader -->
<script src="../public/js/loader.js"></script>
<!-- Load Alerts -->
<script src="../public/js/libs/toastr/toastr.min.js"></script>
<!-- Init  Alerts -->
<?php if (isset($success)) { ?>
    <!-- Pop Success Alert -->
    <script>
        toastr.success("<?php echo $success; ?>", "", {
            positionClass: "toast-bottom-center",
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
            positionClass: "toast-bottom-center",
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
            positionClass: "toast-bottom-center",
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