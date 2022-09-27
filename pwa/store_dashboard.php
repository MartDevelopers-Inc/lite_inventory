<?php
/*
 *   Crafted On Mon Sep 26 2022
 *
 * 
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD End User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. GRANT OF LICENSE 
 *   Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 *   install and activate this system on two separated computers solely for your personal and non-commercial use,
 *   unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 *   or allowing other individuals to view the contents of this Software, is in violation of this license.
 *   You may not make the Software available on a network, or in any way provide the Software to multiple users
 *   unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 *   2. COPYRIGHT 
 *   The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
 *   You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 *
 *   3. RESTRICTIONS ON USE
 *   You may not, and you may not permit others to
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 *   (b) modify, distribute, or create derivative works of the Software;
 *   (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 *   otherwise exploit the Software. 
 *
 *
 *   4. TERM
 *   This License is effective until terminated. 
 *   You may terminate it at any time by destroying the Software, together with all copies thereof.
 *   This License will also terminate if you fail to comply with any term or condition of this Agreement.
 *   Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 *
 *   5. NO OTHER WARRANTIES. 
 *   DEVLAN SOLUTIONS LTD  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 *   DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 *   EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 *   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 *   SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 *   ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 *   INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 *   SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 *   THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 *   HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 *
 *   6. SEVERABILITY
 *   In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 *   affect the validity of the remaining portions of this license.
 *
 *
 *   7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 *   CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 *   USE OF THE SOFTWARE, EVEN IF DEVLAN SOLUTIONS LTD HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 *   IN NO EVENT WILL DEVLAN SOLUTIONS LTD  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 *   TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 *
 */

session_start();
require_once('../config/config.php');
require_once('../helpers/store_analytics.php');
require_once('../partials/pwa_head.php');
?>

<body>

    <!--page loader-->
    <div class="loader-wrapper">
        <div class="d-flex justify-content-center align-items-center position-absolute top-50 start-50 translate-middle">
            <div class="spinner-border text-white" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <!--end loader-->

    <!--start wrapper-->
    <div class="wrapper">

        <!--start to header-->
        <?php require_once('../partials/pwa_header.php'); ?>
        <!--end to header-->

        <!--start to page content-->
        <div class="page-content">

            <div class="py-2"></div>

            <!--start features-->
            <div class="features-section">
                <div class="row row-cols-2 row-cols-md-4 g-3">
                    <div class="col d-flex col-12">
                        <div class="card rounded-3 w-100">
                            <div class="card-body">
                                <div class="icon-wrapper text-center">
                                    <div class="noti-box mb-1 mx-auto bg-success">
                                        <i class="bi bi-cash-coin"></i>
                                    </div>
                                    <p class="fw-bold mb-0 text-dark">Today`s Sales <br>
                                        <?php echo "Ksh " . number_format($today_sales, 2); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card rounded-3 w-100">
                            <div class="card-body">
                                <div class="icon-wrapper text-center">
                                    <div class="noti-box mb-1 mx-auto bg-purple">
                                        <i class="bi bi-diagram-3-fill"></i>
                                    </div>
                                    <p class="fw-bold mb-0 text-dark">
                                        Total Items <br>
                                        <?php echo $products ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card rounded-3 w-100">
                            <div class="card-body">
                                <div class="icon-wrapper text-center">
                                    <div class="noti-box mb-1 mx-auto bg-red">
                                        <i class="bi bi-exclamation-lg"></i>
                                    </div>
                                    <p class="fw-bold mb-0 text-dark">
                                        Out Of Stock <br>
                                        <?php echo $out_of_stock ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--end features-->

            <div class="py-2">
                <hr>
            </div>

            <!--start trending category-->
            <div class="trending-category">
                <h4 class="my-2 text-center fw-bold section-title">Sales logs on <?php echo date('d M Y'); ?></h4>
                <div class="card rounded-3 border-0 bg-transparent">
                    <div class="card-body">
                        <ul class="timeline-with-icons">
                            <?php
                            /* Load Recent Sales Today */
                            $raw_results = mysqli_query($mysqli, "SELECT  * FROM sales s
                            INNER JOIN products p ON p.product_id = s.sale_product_id
                            INNER JOIN users u ON u.user_id = s.sale_user_id
                            WHERE DATE(s.sale_datetime)=CURDATE()  AND p.product_store_id = '{$view}'
                            ORDER BY s.sale_datetime DESC LIMIT 10");
                            if (mysqli_num_rows($raw_results) > 0) {
                                while ($results = mysqli_fetch_array($raw_results)) {
                            ?>
                                    <li class="timeline-item mb-5">
                                        <span class="timeline-icon active bg-success">
                                            <i class="bi bi-check-lg"></i>
                                        </span>
                                        <p class="fw-bold text-dark">
                                            <?php echo $results['user_name']; ?> Sold <span class="text-success"><?php echo $results['product_name']; ?></span>
                                            To <span class="text-success"><?php echo $results['sale_customer_name']; ?></span>.
                                            Quantity Sold Is <span class="text-success"><?php echo $results['sale_quantity']; ?>
                                        </p>
                                        <p class="text-muted mb-0"><?php echo date('g:ia', strtotime($results['sale_datetime'])); ?></p>
                                    </li>
                                <?php }
                            } else { ?>
                                <li class="timeline-item mb-5">
                                    <span class="timeline-icon text-danger">
                                        <i class="bi bi-exclamation-circle"></i>
                                    </span>
                                    <p class="fw-bold">No Sales Recorded So Far</p>
                                    <p class="text-muted mb-0"><?php echo date('g:ia'); ?></p>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!--end trending category-->

        </div>
        <!--end to page content-->


        <!--start to footer-->
        <?php require_once('../partials/pwa_footer_menu.php'); ?>
        <!--end to footer-->

    </div>
    <!--end wrapper-->


    <!--JS Files-->
    <?php require_once('../partials/pwa_scripts.php'); ?>

</body>


</html>