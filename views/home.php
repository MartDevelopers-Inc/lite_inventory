<?php
/*
 * Created on Sat May 14 2022
 *
 * Devlan Solutions LTD - www.devlan.co.ke 
 *
 * hello@devlan.co.ke
 *
 *
 * The Devlan Solutions LTD End User License Agreement
 *
 * Copyright (c) 2022 Devlan Solutions LTD
 *
 * 1. GRANT OF LICENSE
 * Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 * install and activate this system on two separated computers solely for your personal and non-commercial use,
 * unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 * or allowing other individuals to view the contents of this Software, is in violation of this license.
 * You may not make the Software available on a network, or in any way provide the Software to multiple users
 * unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 * 2. COPYRIGHT 
 * The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
 * You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 * 3. RESTRICTIONS ON USE
 * You may not, and you may not permit others to
 * (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 * (b) modify, distribute, or create derivative works of the Software;
 * (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 * otherwise exploit the Software.  
 *
 * 4. TERM
 * This License is effective until terminated. 
 * You may terminate it at any time by destroying the Software, together with all copies thereof.
 * This License will also terminate if you fail to comply with any term or condition of this Agreement.
 * Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 * 5. NO OTHER WARRANTIES. 
 * DEVLAN SOLUTIONS LTD DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 * DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 * EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 * SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 * ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 * INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 * SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 * THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 * HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 * 6. SEVERABILITY
 * In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 * affect the validity of the remaining portions of this license.
 *
 * 7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD  OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 * CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 * USE OF THE SOFTWARE, EVEN IF DEVLAN HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 * IN NO EVENT WILL DEVLAN  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 * TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 */
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
check_login();
require_once('../partials/head.php');
/* Load Analytics */
require_once('../helpers/admin_analytics.php');
?>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?php require_once('../partials/sidebar.php'); ?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php require_once('../partials/header.php');
                /* Pop System Settings Here */
                $user_id = $_SESSION['user_id'];
                $ret = "SELECT * FROM  system_settings JOIN users WHERE user_id = '{$user_id}' ";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                while ($settings = $res->fetch_object()) {
                ?>
                    <!-- main header @e -->
                    <!-- content @s -->
                    <div class="nk-content ">
                        <div class="container-fluid">
                            <div class="nk-content-inner">
                                <div class="nk-content-body">
                                    <div class="nk-block-head nk-block-head-sm">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h3 class="nk-block-title page-title">Dashboard</h3>
                                                <div class="nk-block-des text-soft">
                                                    <p>Hello, Welcome to <?php echo $settings->system_name . ' ' . $settings->user_access_level; ?> Dashboard</p>
                                                </div>
                                            </div><!-- .nk-block-head-content -->
                                        </div><!-- .nk-block-between -->
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="row g-gs">
                                            <div class="col-md-4">
                                                <div class="card card-bordered card-full border border-success">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-0">
                                                            <div class="card-title">
                                                                <h6 class="subtitle">Today's Sales Revenue</h6>
                                                            </div>
                                                            <div class="card-tools">
                                                                <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="<?php echo date('d M Y'); ?> Sales Revenue"></em>
                                                            </div>
                                                        </div>
                                                        <div class="card-amount">
                                                            <span class="amount">
                                                                <?php echo "Ksh " . number_format($today_sales, 2); ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                            <div class="col-md-4">
                                                <div class="card card-bordered card-full border border-success">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-0">
                                                            <div class="card-title">
                                                                <h6 class="subtitle">Total Items</h6>
                                                            </div>
                                                            <div class="card-tools">
                                                                <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Registered Items"></em>
                                                            </div>
                                                        </div>
                                                        <div class="card-amount">
                                                            <span class="amount">
                                                                <?php echo $products ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                            <div class="col-md-4">
                                                <div class="card card-bordered  card-full border border-danger">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-0">
                                                            <div class="card-title">
                                                                <h6 class="subtitle">Low / Out Of Stock Items</h6>
                                                            </div>
                                                            <div class="card-tools">
                                                                <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Items That Have Reached Restock Limit Or Low In Qty"></em>
                                                            </div>
                                                        </div>
                                                        <div class="card-amount">
                                                            <span class="amount text-danger">
                                                                <?php echo $out_of_stock ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                            <div class="col-12">
                                                <div class="card mb-3  border border-success">
                                                    <div class="card-inner">
                                                        <div class="card-title">
                                                            <h6 class="title text-center"><?php echo date('M d Y'); ?> Sales Revenue Overview</h6>
                                                        </div>
                                                        <div class="nk-ck">
                                                            <canvas class="line-chart" id="filledLineChart"></canvas>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-preview -->
                                            </div>
                                            <div class="col-md-6 col-xxl-4">
                                                <div class="card card-bordered h-100 border border-success">
                                                    <div class="card-inner border-bottom">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Today Sales Logs</h6>
                                                            </div>
                                                            <div class="card-tools">
                                                                <a href="main_dashboard_manage_sales" class="link">View All</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner">
                                                        <div class="timeline">
                                                            <h6 class="timeline-head"><?php echo date('d M Y'); ?></h6>
                                                            <ul class="timeline-list">
                                                                <?php
                                                                /* Load Recent Sales Today */
                                                                $raw_results = mysqli_query($mysqli, "SELECT  * FROM sales s
                                                                INNER JOIN products p ON p.product_id = s.sale_product_id
                                                                INNER JOIN users u ON u.user_id = s.sale_user_id
                                                                WHERE DATE(s.sale_datetime)=CURDATE() 
                                                                ORDER BY s.sale_datetime DESC LIMIT 10");
                                                                if (mysqli_num_rows($raw_results) > 0) {
                                                                    while ($results = mysqli_fetch_array($raw_results)) {
                                                                ?>
                                                                        <li class="timeline-item">
                                                                            <div class="timeline-status bg-primary is-outline"></div>
                                                                            <div class="timeline-date"><?php echo date('g:ia', strtotime($results['sale_datetime'])); ?> <em class="text-success icon ni ni-clipboad-check-fill"></em></div>
                                                                            <div class="timeline-data">
                                                                                <h6 class="timeline-title"><?php echo $results['user_name']; ?> Sold <span class="text-success"><?php echo $results['product_name']; ?></span></h6>
                                                                                <div class="timeline-des">
                                                                                    <p>
                                                                                        To <span class="text-success"><?php echo $results['sale_customer_name']; ?></span>.
                                                                                        Quantity Sold Is <span class="text-success"><?php echo $results['sale_quantity']; ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    <?php }
                                                                } else { ?>
                                                                    <li class="timeline-item">
                                                                        <div class="timeline-status bg-danger is-outline"></div>
                                                                        <div class="timeline-date text-danger"><?php echo date('g:ia'); ?><em class="text-danger icon ni ni-alert-fill"></em></div>
                                                                        <div class="timeline-data ">
                                                                            <h6 class="timeline-title text-danger">No Sales Recorded So Far</span></h6>
                                                                        </div>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                            <div class="col-xl-6 col-xxl-8">
                                                <div class="card card-bordered card-full border border-success">
                                                    <div class="card-inner border-bottom">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Low / Out Of Stock Items</h6>
                                                            </div>
                                                            <div class="card-tools">
                                                                <a href="main_dashboard_manage_stock" class="link">View All</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-list">
                                                        <div class="nk-tb-item">
                                                            <ul class="nk-activity">
                                                                <?php
                                                                /* Load Recent Out Of Stock Products */
                                                                $raw_results = mysqli_query($mysqli, "SELECT  * FROM `products` 
                                                                WHERE product_quantity <= 1 ORDER BY product_name ASC LIMIT 10");
                                                                if (mysqli_num_rows($raw_results) > 0) {
                                                                    while ($results = mysqli_fetch_array($raw_results)) {
                                                                ?>
                                                                        <li class="nk-activity-item">
                                                                            <div class="nk-activity-data">
                                                                                <div class="label">
                                                                                    <span class="text-danger"><?php echo $results['product_code'] . ' ' . $results['product_name']; ?> </span> is out of stock, kindly plan to restock it.
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    <?php }
                                                                } else { ?>
                                                                    <li class="nk-activity-item">
                                                                        <div class="nk-activity-data">
                                                                            <div class="label">
                                                                                <span class="text-success"> No out of stock items, good job in keeping your store stocked </span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- content @e -->
                <!-- footer @s -->
                <?php require_once('../partials/footer.php'); ?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <?php
    require_once('../partials/scripts.php');
    require_once('../functions/dashboard_sales_chart.php');
    ?>
</body>

</html>