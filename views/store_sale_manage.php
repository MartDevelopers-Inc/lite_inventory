<?php
/*
 * Created on Sun May 29 2022
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
/* Roll Back Sale Record */
if (isset($_POST['delete_sale'])) {
    $sale_id = mysqli_real_escape_string($mysqli, $_POST['sale_id']);
    $product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);
    $sale_quantity = mysqli_real_escape_string($mysqli, $_POST['sale_quantity']);
    $user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $user_password = mysqli_real_escape_string($mysqli, sha1(md5($_POST['user_password'])));
    /* Activity Logged */
    $log_type = 'Sales Management Logs';
    $log_details = mysqli_real_escape_string($mysqli, $_POST['log_details']);

    /* Check If This Fella Password Matches */
    $sql = "SELECT * FROM  users  WHERE user_id = '{$user_id}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($user_password != $row['user_password']) {
            $err = "Please Enter Correct Password";
        } else {
            /* Pop Product Details */
            $sql = "SELECT * FROM  products  WHERE product_id = '{$product_id}'";
            $return = mysqli_query($mysqli, $sql);
            if (mysqli_num_rows($return) > 0) {
                $product_details = mysqli_fetch_assoc($return);
                /* New Quantity */
                $new_stock = $product_details['product_quantity'] + $sale_quantity;
                /* Persist */
                $product_sql = "UPDATE products SET product_quantity = '{$new_stock}' WHERE product_id = '{$product_id}'";
                $sale_sql = "DELETE FROM sales WHERE sale_id = '{$sale_id}'";

                $product_prepare = $mysqli->prepare($product_sql);
                $sale_prepare = $mysqli->prepare($sale_sql);

                $product_prepare->execute();
                $sale_prepare->execute();

                /* Log Operation */
                include('../functions/logs.php');
                if ($product_prepare && $sale_prepare) {
                    $success = "Cash Sale Rolled Back";
                } else {
                    $err = "Failed!, Please Try Again";
                }
            }
        }
    }
}
require_once('../partials/head.php');
?>

<body class="nk-body npc-invest bg-lighter ">
    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <?php require_once('../partials/store_header.php');
            /* Get Receipt Number */
            $receipt = mysqli_real_escape_string($mysqli, $_GET['receipt']);
            /* Get Store_ID */
            $store_id = mysqli_real_escape_string($mysqli, $_GET['view']);
            ?>
            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content nk-content-lg nk-content-fluid">
                <div class="container-xl wide-lg">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head">
                                <div class="nk-block-between-md g-3">
                                    <div class="nk-block-head-content">
                                        <div class="align-center flex-wrap pb-2 gx-4 gy-3">
                                            <div>
                                                <h4 class="nk-block-title fw-normal">Receipt #<?php echo $receipt; ?> Details</h4>
                                                <p>
                                                    This is a detailed record of sale receipt #<?php echo $receipt; ?> <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <?php
                                                    /* Get Receipt Attributes */
                                                    $sql = "SELECT * FROM sales WHERE sale_receipt_no = '{$receipt}'";
                                                    $res = mysqli_query($mysqli, $sql);
                                                    if (mysqli_num_rows($res) > 0) {
                                                        $receipts = mysqli_fetch_assoc($res);
                                                    ?>
                                                        <li><a href="main_dashboard_download_receipt?number=<?php echo $receipt; ?>&customer=<?php echo $receipts['sale_customer_name']; ?>" class="btn btn-white btn-outline-light"><em class="icon ni ni-download"></em><span>Download Receipt</span></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div><!-- .toggle-wrap -->
                                    </div><!-- .nk-block-head-content -->
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="card mb-3 col-md-12 border border-success">
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .nk-block -->
        </div>
    </div>
    <!-- content @e -->
    <!-- footer @s -->
    <?php require_once('../partials/pos_footer.php');; ?>
    <!-- footer @e -->
    </div>
    <!-- wrap @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>