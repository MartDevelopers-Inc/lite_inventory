<footer class="page-footer fixed-bottom border-top d-flex align-items-center">
    <nav class="navbar navbar-expand p-0 flex-grow-1">
        <div class="navbar-nav align-items-center justify-content-between w-100">
            <a class="nav-link" href="store_dashboard?view=<?php echo $store_id; ?>">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon"><i class="bi bi-house"></i></div>
                    <div class="name">Home</div>
                </div>
            </a>
            <a class="nav-link" href="store_reports_sales?view=<?php echo $store_id; ?>">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon"><i class="bi bi-cart-check"></i></div>
                    <div class="name">Sales</div>
                </div>
            </a>
            <a class="nav-link" href="store_sales?view=<?php echo $store_id; ?>">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon"><i class="bi bi-card-checklist"></i></div>
                    <div class="name">Stocks</div>
                </div>
            </a>

            <a class="nav-link" href="store_reports_p_l_statements?view=<?php echo $store_id; ?>">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon"><i class="bi bi-graph-up-arrow"></i></div>
                    <div class="name">P & L </div>
                </div>
            </a>
        </div>
    </nav>
</footer>