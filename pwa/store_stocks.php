<?php
/*
 *   Crafted On Tue Sep 27 2022
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
            <br>
            <div class="py-2">
                <h6 class="text-center fw-bold section-title">
                    Stock Reports
                </h6>
            </div>
            <hr>
            <br>
            <div class="row row-cols-1 g-3">
                <div class="col">
                    <div class="card rounded-3 mb-0 border border-success" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample_1">
                        <div class="card-body ">
                            <div class="d-flex flex-row align-items-center justify-content-between gap-2">
                                <div class="category-name">
                                    <p class="mb-0 fw-bold text-dark fs-5">Current stock reports</p>
                                </div>
                                <div class="category-img">
                                    <img src="../public/images/stocks.png" class="img-fluid" width="50" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-3 mb-0 border border-primary" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample">
                        <div class="card-body">
                            <div class="d-flex flex-row align-items-center justify-content-between gap-2">
                                <div class="category-name">
                                    <p class="mb-0 fw-bold text-dark fs-5">Stock addition reports</p>
                                </div>
                                <div class="category-img">
                                    <img src="../public/images/stock_addition.png" class="img-fluid" width="50" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse collapse-horizontal" id="collapseWidthExample_1">
                <hr>
                <div class="row row-cols-1 g-3">
                    <div class="col">
                        <a href="../views/store_system_inventory_pdf_dump?view=<?php echo $_GET['view']; ?>">
                            <div class="card rounded-3 mb-0 border border-success">
                                <div class="card-body">
                                    <div class="d-flex flex-row align-items-center justify-content-between gap-2">
                                        <div class="category-name">
                                            <p class="mb-0 fw-bold text-dark fs-5">Download as PDF</p>
                                        </div>
                                        <div class="category-img">
                                            <img src="../public/images/pdf-file.png" class="img-fluid" width="40" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="../views/store_system_inventory_xls_dump?view=<?php echo $_GET['view']; ?>">
                            <div class="card rounded-3 mb-0 border border-success">
                                <div class="card-body">
                                    <div class="d-flex flex-row align-items-center justify-content-between gap-2">
                                        <div class="category-name">
                                            <p class="mb-0 fw-bold text-dark fs-5">Download as Excel</p>
                                        </div>
                                        <div class="category-img">
                                            <img src="../public/images/xls.png" class="img-fluid" width="40" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php
            $start = date('Y-m-d', strtotime('-30 days'));
            $end = date('Y-m-d');
            ?>
            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                <hr>
                <div class="row row-cols-1 g-3">
                    <div class="col">
                        <a href="../views/main_dashboard_system_stock_addition_pdf_dump?store=<?php echo $_GET['view']; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>">
                            <div class="card rounded-3 mb-0 border border-primary">
                                <div class="card-body">
                                    <div class="d-flex flex-row align-items-center justify-content-between gap-2">
                                        <div class="category-name">
                                            <p class="mb-0 fw-bold text-dark fs-5">Download as PDF</p>
                                        </div>
                                        <div class="category-img">
                                            <img src="../public/images/pdf-file.png" class="img-fluid" width="40" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="../views/main_dashboard_system_stock_addition_xls_dump?store=<?php echo $_GET['view']; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>">
                            <div class="card rounded-3 mb-0 border border-primary">
                                <div class="card-body">
                                    <div class="d-flex flex-row align-items-center justify-content-between gap-2">
                                        <div class="category-name">
                                            <p class="mb-0 fw-bold text-dark fs-5">Download as Excel</p>
                                        </div>
                                        <div class="category-img">
                                            <img src="../public/images/xls.png" class="img-fluid" width="40" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
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