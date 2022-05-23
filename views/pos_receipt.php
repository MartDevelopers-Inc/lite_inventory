<?php
/*
 * Created on Sat May 21 2022
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

<body class="nk-body npc-invest bg-lighter ">
    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <?php require_once('../partials/pos_header_receipt.php'); ?>
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
                                                <h4 class="nk-block-title fw-normal">Receipt # <?php echo $_GET['receipt']; ?> Preview</h4>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="text-center">
                                    <a href="pos?action=empty" class="btn btn-primary btn-round">
                                        <em class="icon ni ni-histroy"></em> Return To Sales
                                    </a>
                                    <a href="main_dashboard_download_receipt?number=<?php echo $_GET['receipt']; ?>&customer=<?php echo $_GET['customer']; ?>" class="btn btn-primary btn-round">
                                        <em class="icon ni ni-printer-fill"></em> Print Receipt
                                    </a>
                                </div>
                                <br>
                                <div class="d-flex justify-content-center">
                                    <div class="row gy-gs">
                                        <div class="card border border-success col-12">
                                            <?php
                                            /* Load Receipt Settings */
                                            $sql = "SELECT * FROM receipt_customization";
                                            $stmt = $mysqli->prepare($sql);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($settings = $res->fetch_object()) {
                                                if (isset($_GET['receipt']) && isset($_SESSION["cart_item"])) {
                                                    $total_quantity = 0;
                                                    $total_price = 0;
                                            ?>
                                                    <div class="text-center">
                                                        <h6>
                                                            <?php
                                                            echo $settings->receipt_header_content;
                                                            $date = new DateTime("now", new DateTimeZone('EAT'));
                                                            echo  $date->format('d M Y H:i') . '<br>';
                                                            echo "Cash Sale Receipt # " . $_GET['receipt'] . '<br>';
                                                            if ($settings->receipt_show_barcode == 'true') {
                                                                /* Load Barcode Here */
                                                                echo "<img alt='barcode' src='../functions/barcode.php?codetype=Code39&size=20&text=" . $_GET['receipt'] . "&print=true'/>";
                                                            }
                                                            ?>
                                                            <br>
                                                        </h6>
                                                        <br>
                                                    </div>
                                                    <table class="table" cellpadding="10" cellspacing="1">
                                                        <tbody>
                                                            <tr>
                                                                <th style="text-align:left;">Name</th>
                                                                <th style="text-align:right;" width="5%">Quantity</th>
                                                                <th style="text-align:right;" width="10%">Unit Price</th>
                                                                <th style="text-align:right;" width="10%">Price</th>
                                                            </tr>
                                                            <?php
                                                            foreach ($_SESSION["cart_item"] as $item) {
                                                                $item_price = $item["quantity"] * $item["product_sale_price"];
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo  $item["product_code"] . ' ' . $item["product_name"]; ?></td>
                                                                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                                                                    <td style="text-align:right;"><?php echo "Ksh " . number_format($item["product_sale_price"], 2); ?></td>
                                                                    <td style="text-align:right;"><?php echo "Ksh " . number_format($item_price, 2); ?></td>
                                                                </tr>
                                                            <?php
                                                                $total_quantity += $item["quantity"];
                                                                $total_price += ($item["product_sale_price"] * $item["quantity"]);
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td colspan="1" align="right">Total:</td>
                                                                <td align="right"><?php echo $total_quantity; ?></td>
                                                                <td align="right" colspan="2"><strong><?php echo "Ksh " . number_format($total_price, 2); ?></strong></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <?php
                                                    /* Load Logged In User Session */
                                                    $user_id = $_SESSION['user_id'];
                                                    $sql = "SELECT * FROM  users  WHERE user_id = '$user_id'";
                                                    $res = mysqli_query($mysqli, $sql);
                                                    if (mysqli_num_rows($res) > 0) {
                                                        $users = mysqli_fetch_assoc($res);
                                                    ?>
                                                        <p class="text-center">You Were Served By <?php echo $users['user_name']; ?></p>
                                                        <p class="text-center">
                                                            <i>
                                                                <?php echo $settings->receipt_footer_content; ?>
                                                            </i>
                                                        </p>
                                                    <?php } ?>
                                            <?php }
                                            }
                                            ?>
                                            <!-- End Receipt -->
                                        </div>
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
    <?php require_once('../partials/pos_footer.php'); ?>
    <!-- footer @e -->
    </div>
    <!-- wrap @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>