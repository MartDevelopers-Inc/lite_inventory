<header class="top-header fixed-top border-bottom d-flex align-items-center">
    <nav class="navbar navbar-expand w-100 p-0 gap-3 align-items-center">
        <div class="brand-logo">
            <a href="javascript:;" class="text-dark"><img src="https://nativebeecare.co.ke/assets/img/logo/favicon.png" width="50" alt=""><b> <?php echo $system_name; ?></b></a>
        </div>
        <ul class="navbar-nav ms-auto d-flex align-items-center top-right-menu">
            <li class="nav-item">
                <a class="nav-link position-relative text-danger" data-bs-toggle="modal" data-bs-target="#logout_modal" href="">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
            </li>
        </ul>
    </nav>
</header>

<!-- Logout Modal -->
<div class="modal fade" id="logout_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">End Session</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure, you want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                <a href="pwa_logout" class="btn btn-danger">Yes, Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- End Modal -->