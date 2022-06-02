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
                                            <h3 class="nk-block-title page-title">Profit And Loss Statements</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>
                                                    Customize, generate and export P&L statements reports in spreadsheet(.csv, .xlsx, .xls) or pdf format. <br>
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
                                                                <label>From Date</label>
                                                                <input type="text" name="start_date" required class="date-picker form-control">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>To Date</label>
                                                                <input type="text" name="end_date" required class="date-picker form-control">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Select Store</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <select name="store" class="form-select form-control form-control-lg" data-search="on">
                                                                                <?php
                                                                                $raw_results = mysqli_query($mysqli, "SELECT * FROM store_settings WHERE store_status = 'active'");
                                                                                if (mysqli_num_rows($raw_results) > 0) {
                                                                                    while ($stores = mysqli_fetch_array($raw_results)) {
                                                                                ?>
                                                                                        <option value="<?php echo $stores['store_id']; ?>"><?php echo $stores['store_name']; ?></option>
                                                                                <?php }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-right">
                                                            <button name="get_statements" class="btn btn-primary" type="submit">
                                                                <em class="icon ni ni-report-profit"></em> Get Reports
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_POST['get_statements'])) {
                                        $start = date('Y-m-d', strtotime($_POST['start_date']));
                                        $end = date('Y-m-d', strtotime($_POST['end_date']));
                                        $store = $_POST['store'];
                                    ?>
                                        <div class="card mb-3 col-12 border border-success">
                                            <div class="card-body">
                                                <h5 class="text-right">
                                                    <a class="btn btn-primary" href="store_system_pl_pdf_dump?from=<?php echo $_POST['start_date']; ?>&to=<?php echo $_POST['end_date']; ?>&store=<?php echo $store; ?>"><em class="icon ni ni-file-docs"></em> Export To PDF</a>
                                                    <a class="btn btn-primary" href="store_system_pl_xls_dump?from=<?php echo $_POST['start_date']; ?>&to=<?php echo $_POST['end_date']; ?>&store=<?php echo $store; ?>"><em class="icon ni ni-grid-add-fill-c"></em> Export To Excel</a>
                                                </h5>
                                                <div class="card-header">
                                                    <h5 class="text-center text-primary">P&L Report Of All Posted Sales From <?php echo date('M d Y', strtotime($start)) . ' To ' . date('M d Y', strtotime($end)); ?></h5>
                                                </div>
                                                <table class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Item</th>
                                                            <th>Date Sold</th>
                                                            <th>Purchase Price</th>
                                                            <th>Sale Price</th>
                                                            <th>Discounted Amount</th>
                                                            <th>QTY Sold</th>
                                                            <th>Margin</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $ret = "SELECT * FROM sales s
                                                        INNER JOIN products p ON p.product_id = sale_product_id
                                                        INNER JOIN users us ON us.user_id = s.sale_user_id
                                                        WHERE p.product_store_id = '{$store}' AND s.sale_datetime BETWEEN '{$start}' AND '{$end}'
                                                        ORDER BY sale_datetime ASC ";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->execute(); //ok
                                                        $res = $stmt->get_result();
                                                        $cumulative_income = 0;
                                                        $cumulative_expenditure = 0;
                                                        while ($sales = $res->fetch_object()) {
                                                            /* Sale Amount  */
                                                            $sales_amount = $sales->sale_quantity * $sales->sale_payment_amount;
                                                            $discounted_price = $sales->product_sale_price - $sales->sale_discount;
                                                            $sale_margin = ($sales->product_sale_price - $sales->product_purchase_price) * $sales->sale_quantity;

                                                        ?>
                                                            <tr>
                                                                <td><?php echo $sales->product_name ?></td>
                                                                <td><?php echo date('d M Y g:ia', strtotime($sales->sale_datetime)) ?></td>
                                                                <td><?php echo "Ksh " . number_format($sales->product_purchase_price, 2); ?></td>
                                                                <td><?php echo "Ksh " . number_format($sales->product_sale_price, 2); ?></td>
                                                                <td><?php echo "Ksh " . number_format($discounted_price, 2); ?></td>
                                                                <td><?php echo $sales->sale_quantity ?></td>
                                                                <td><?php echo "Ksh " . number_format($sale_margin); ?></td>
                                                                <td>
                                                                    <?php echo "Ksh " . number_format($sales_amount, 2);
                                                                    $cumulative_income += $sales_amount;
                                                                    $cumulative_expenditure += ($sales->product_purchase_price * $sales->sale_quantity);
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td colspan="7"><b>Cumulative Sales :</b></td>
                                                            <td><b><?php echo  "Ksh " . number_format($cumulative_income, 2); ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="7"><b>Cumulative Purchase:</b></td>
                                                            <td><b><?php echo  "Ksh " . number_format($cumulative_expenditure, 2); ?></b></td>
                                                        </tr>
                                                        <?php
                                                        if ($cumulative_expenditure > $cumulative_income) {
                                                        ?>
                                                            <tr>
                                                                <td colspan="7"><b>Cumulative Loss :</b></td>
                                                                <td><b><?php echo  "Ksh " . number_format(abs($cumulative_income - $cumulative_expenditure), 2); ?></b></td>
                                                            </tr>
                                                        <?php } else if ($cumulative_expenditure < $cumulative_income) { ?>
                                                            <tr>
                                                                <td colspan="7"><b>Cumulative Profit:</b></td>
                                                                <td><b><?php echo  "Ksh " . number_format(abs($cumulative_income - $cumulative_expenditure), 2); ?></b></td>
                                                            </tr>
                                                        <?php } else { ?>
                                                            <tr>
                                                                <td colspan="7"><b>Cumulative Loss Or Profit:</b></td>
                                                                <td><b><?php echo  "Ksh " . number_format(($cumulative_income - $cumulative_expenditure), 2); ?></b></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php } ?>
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