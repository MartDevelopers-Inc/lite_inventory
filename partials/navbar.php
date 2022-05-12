<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <?php
            /* Load This Partials With Logged In User Session */
            $user_id = $_SESSION['user_id'];
            $ret = "SELECT * FROM users
            WHERE user_id = '$user_id'";
            $stmt = $mysqli->prepare($ret);
            $stmt->execute();
            $res = $stmt->get_result();
            while ($logged_in_user = $res->fetch_object()) {
            ?>
                <div class="main-menu-header">
                    <img class="img-80 img-radius" src="../public/images/no-profile.png" alt="User-Profile-Image">
                    <div class="user-details">
                        <span id="more-details">Hello, <?php echo $logged_in_user->user_name; ?><i class="fa fa-caret-down"></i></span>
                    </div>
                </div>
                <div class="main-menu-content">
                    <ul>
                        <li class="more-details">
                            <a href="main_dashboard_profile"><i class="fas fa-user-cog"></i>Profile Settings</a>
                            <a href="logout"><i class="fas fa-power-off"></i>Log Out</a>
                        </li>
                    </ul>
                </div>
            <?php } ?>
        </div>
        <!-- <div class="p-15 p-b-0">
            <form class="form-material">
                <div class="form-group form-primary">
                    <input type="text" name="footer-email" class="form-control">
                    <span class="form-bar"></span>
                    <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                </div>
            </form>
        </div> -->
        <div class="pcoded-navigation-label"></div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="main_dashboard" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-tachometer-alt"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label">Stores</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="main_dashboard_stores" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-store-alt"></i><b>FC</b></span>
                    <span class="pcoded-mtext">Manage Stores</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Produts</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-boxes"></i><b>BC</b></span>
                    <span class="pcoded-mtext">Manage Products</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="main_dashboard_bulk_import_products" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Bulk Import</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="main_dashboard_products" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Products</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Inventory</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="main_dashboard_manage_stocks" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-box-open"></i><b>D</b></span>
                    <span class="pcoded-mtext">Manage Stocks</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label">Workforce</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="main_dashboard_staffs" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-user-tie"></i><b>FC</b></span>
                    <span class="pcoded-mtext">Staffs</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Sales</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="main_dashboard_sales" class="waves-effect waves-dark">

                    <span class="pcoded-micon"><i class="fas fa-cash-register"></i><b>B</b></span>
                    <span class="pcoded-mtext">Sale point</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <li class="">
                <a href="main_dashboard_sales_manage" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-file"></i><b>B</b></span>
                    <span class="pcoded-mtext">Sales Manage</span>

                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <!-- <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="main_dashboard_sales" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-cash-register"></i><b>B</b></span>
                    <span class="pcoded-mtext">Manage Sales</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul> -->
        <div class="pcoded-navigation-label">Reports</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="main_dashboard_sales_reports" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-file-chart-line"></i><b>C</b></span>
                    <span class="pcoded-mtext">Sales Reports</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="main_dashboard_customer_purchases_reports" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-users"></i><b>M</b></span>
                    <span class="pcoded-mtext">Customer Purchases</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="main_dashboard_staffs_perfomances_reports" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-user-tag"></i><b>M</b></span>
                    <span class="pcoded-mtext">Staffs Perfomances</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="main_dashboard_inventory_reports" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-list"></i><b>M</b></span>
                    <span class="pcoded-mtext">Inventory </span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="main_dashboard_system_logs_reports" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-file-medical-alt"></i><b>M</b></span>
                    <span class="pcoded-mtext">System Logs</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Core Settings</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="main_dashboard_store_settings" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-cogs"></i><b>C</b></span>
                    <span class="pcoded-mtext">Stores Settings</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="main_dashboard_restock_settings" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-exclamation-triangle"></i><b>M</b></span>
                    <span class="pcoded-mtext">Restock Limits</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="main_dashboard_mailer_settings" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-mail-bulk"></i><b>M</b></span>
                    <span class="pcoded-mtext">STMP Settings</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>