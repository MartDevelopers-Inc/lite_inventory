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
                            <a href="top_manager_profile"><i class="fas fa-user-cog"></i>Profile Settings</a>
                            <a href="logout"><i class="fas fa-power-off"></i>Log Out</a>
                        </li>
                    </ul>
                </div>
            <?php } ?>
        </div>

        <div class="pcoded-navigation-label"></div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="top_manager_dashboard" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-tachometer-alt"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label">Stores</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="top_manager_stores" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-store-alt"></i><b>FC</b></span>
                    <span class="pcoded-mtext">Manage Stores</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Produts</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="top_manager_products" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-boxes"></i><b>D</b></span>
                    <span class="pcoded-mtext">Manage Produts</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Inventory</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="top_manager_stocks" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-box-open"></i><b>D</b></span>
                    <span class="pcoded-mtext">Manage Stocks</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label">Workforce</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="top_manager_staffs" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-user-tie"></i><b>FC</b></span>
                    <span class="pcoded-mtext">Staffs</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label">Reports</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="top_manager_sales_reports" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-file-chart-line"></i><b>C</b></span>
                    <span class="pcoded-mtext">Sales Reports</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <!--
            <li class="">
                <a href="top_manager_customer_purchases_reports" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-users"></i><b>M</b></span>
                    <span class="pcoded-mtext">Customer Purchases</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="top_manager_staffs_perfomances_reports" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-user-tag"></i><b>M</b></span>
                    <span class="pcoded-mtext">Staffs Perfomances</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            -->
            <li class="">
                <a href="top_manager_inventory_reports" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-list"></i><b>M</b></span>
                    <span class="pcoded-mtext">Inventory </span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="top_manager_system_logs_reports" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fas fa-file-medical-alt"></i><b>M</b></span>
                    <span class="pcoded-mtext">System Logs</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>