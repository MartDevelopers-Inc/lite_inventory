<?php
/*
 * Created on Thu May 19 2022
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
require_once('../config/codeGen.php');
check_login();
require_once('../partials/head.php');
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
                <?php require_once('../partials/header.php'); ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Logs Reports</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>
                                                    Customize, generate and system access logs reports in spreadsheet(.csv, .xlsx, .xls) or pdf format. <br>
                                                </p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->

                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <!-- End Modal -->
                                <div class="row">
                                    <div class="card mb-3 col-12 border border-success">
                                        <div class="row no-gutters">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label>Logs From Date</label>
                                                                <input type="date" name="start_date" required class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Logs To Date</label>
                                                                <input type="date" name="end_date" required class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Log Report Type</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <select name="log_type" class="form-select form-control form-control-lg" data-search="on">
                                                                                <option>All Logs</option>
                                                                                <option>Authentication Logs</option>
                                                                                <option>User Account Management Logs</option>
                                                                                <option>Items Management Logs</option>
                                                                                <option>Stock Management Logs</option>
                                                                                <option>Sales Management Logs</option>
                                                                                <option>Stores Management Logs</option>
                                                                                <option>Settings & Configurations Logs</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-right">
                                                            <button name="get_logs" class="btn btn-primary" type="submit">
                                                                <em class="icon ni ni-reports-alt"></em> Get Reports
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_POST['get_logs'])) {
                                        $start = date('Y-m-d', strtotime($_POST['start_date']));
                                        $end = date('Y-m-d', strtotime($_POST['end_date']));
                                        $log_type = $_POST['log_type'];
                                    ?>
                                        <div class="card mb-3 col-12 border border-success">
                                            <div class="card-body">
                                                <h5 class="text-right">
                                                    <a class="btn btn-primary" href="main_dashboard_system_log_pdf_dump?from=<?php echo $_POST['start_date']; ?>&to=<?php echo $_POST['end_date']; ?>&log_type=<?php echo $_POST['log_type']; ?>"><em class="icon ni ni-file-docs"></em> Export To PDF</a>
                                                    <a class="btn btn-primary" href="main_dashboard_system_log_xls_dump?from=<?php echo $_POST['start_date']; ?>&to=<?php echo $_POST['end_date']; ?>&log_type=<?php echo $_POST['log_type']; ?>"><em class="icon ni ni-grid-add-fill-c"></em> Export To CSV</a>
                                                </h5>
                                                <h5 class="text-center text-primary"><?php echo $log_type; ?> From <?php echo date('M d Y', strtotime($start)) . ' To ' . date('M d Y', strtotime($end)); ?></h5>
                                                <hr>
                                                <table class="table datatable-init">
                                                    <thead>
                                                        <tr>
                                                            <th>User Detais</th>
                                                            <th>IP Address</th>
                                                            <th>Created At</th>
                                                            <th>Details</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        /* Filter Logs */
                                                        if ($log_type == 'All Logs') {
                                                            $ret = "SELECT * FROM system_logs l INNER JOIN users u
                                                            ON u.user_id = l.log_user_id WHERE l.log_created_at
                                                            BETWEEN '{$start}' AND '{$end}' ORDER BY l.log_created_at DESC";
                                                            $stmt = $mysqli->prepare($ret);
                                                            $stmt->execute(); //ok
                                                            $res = $stmt->get_result();
                                                            while ($logs = $res->fetch_object()) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $logs->user_name . ' <br> ' . $logs->user_email ?></td>
                                                                    <td><?php echo $logs->log_ip_address ?></td>
                                                                    <td><?php echo date('d M Y g:ia', strtotime($logs->log_created_at)) ?></td>
                                                                    <td>
                                                                        <?php echo $logs->log_details; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                        } else {
                                                            $ret = "SELECT * FROM system_logs l INNER JOIN users u
                                                            ON u.user_id = l.log_user_id WHERE l.log_type  = '{$log_type}' 
                                                            AND l.log_created_at BETWEEN '{$start}' AND '{$end}' 
                                                            ORDER BY l.log_created_at DESC";
                                                            $stmt = $mysqli->prepare($ret);
                                                            $stmt->execute(); //ok
                                                            $res = $stmt->get_result();
                                                            while ($logs = $res->fetch_object()) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $logs->user_name . ' <br> ' . $logs->user_email ?></td>
                                                                    <td><?php echo $logs->log_ip_address ?></td>
                                                                    <td><?php echo date('d M Y g:ia', strtotime($logs->log_created_at)) ?></td>
                                                                    <td>
                                                                        <?php echo $logs->log_details; ?>
                                                                    </td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php  } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    include('../functions/sales_reports_chart.php');
    ?>
</body>

</html>