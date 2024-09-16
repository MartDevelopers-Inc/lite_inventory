<?php
/*
 *   Crafted On Mon Sep 16 2024
 *   By the one and only Martin Mbithi (martin@devlan.co.ke)
 *   
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD Super Duper User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. LICENSE TO BE AWESOME
 *   Congrats, you lucky human! Devlan Solutions LTD hereby bestows upon you the magical,
 *   revocable, personal, non-exclusive, and totally non-transferable right to install this epic system
 *   on not one, but TWO separate computers for your personal, non-commercial shenanigans.
 *   Unless, of course, you've leveled up with a commercial license from Devlan Solutions LTD.
 *   Sharing this software with others or letting them even peek at it? Nope, that's a big no-no.
 *   And don't even think about putting this on a network or letting a crowd join the fun unless you
 *   first scored a multi-user license from us. Sharing is caring, but rules are rules!
 *
 *   2. COPYRIGHT POWER-UP
 *   This Software is the prized possession of Devlan Solutions LTD and is shielded by copyright law
 *   and the forces of international copyright treaties. You better not try to hide or mess with
 *   any of our awesome proprietary notices, labels, or marks. Respect the swag!
 *
 *
 *   3. RESTRICTIONS, NO CHEAT CODES ALLOWED
 *   You may not, and you shall not let anyone else:
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or do any sneaky stuff to
 *   figure out the source code of this software;
 *   (b) modify, remix, distribute, or create your own funky version of this masterpiece;
 *   (c) copy (except for that one precious backup), distribute, show off in public, transmit, sell, rent,
 *   lease, or otherwise exploit the Software like it's your own.
 *
 *
 *   4. THE ENDGAME
 *   This License lasts until one of us says 'Game Over'. You can call it quits anytime by
 *   destroying the Software and all the copies you made (no hiding them under your bed).
 *   If you break any of these sacred rules, this License self-destructs, and you must obliterate
 *   every copy of the Software, no questions asked.
 *
 *
 *   5. NO GUARANTEES, JUST PIXELS
 *   DEVLAN SOLUTIONS LTD doesn’t guarantee this Software is flawless—it might have a few
 *   quirks, but who doesn’t? DEVLAN SOLUTIONS LTD washes its hands of any other warranties,
 *   implied or otherwise. That means no promises of perfect performance, marketability, or
 *   non-infringement. Some places have different rules, so you might have extra rights, but don’t
 *   count on us for backup if things go sideways. Use at your own risk, brave adventurer!
 *
 *
 *   6. SEVERABILITY—KEEP THE GOOD STUFF
 *   If any part of this License gets tossed out by a judge, don’t worry—the rest of the agreement
 *   still stands like a boss. Just because one piece fails doesn’t mean the whole thing crumbles.
 *
 *
 *   7. NO DAMAGE, NO DRAMA
 *   Under no circumstances will Devlan Solutions LTD or its squad be held responsible for any wild,
 *   indirect, or accidental chaos that might come from using this software—even if we warned you!
 *   And if you ever think you’ve got a claim, the most you’re getting out of us is the license fee you
 *   paid—if any. No drama, no big payouts, just pixels and code.
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
        <?php require_once('../partials/pwa_header.php');
        $view = $_GET['view'];
        $ret = "SELECT * FROM  store_settings WHERE store_id = '{$view}' ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        while ($store = $res->fetch_object()) {
        ?>
            <!--end to header-->

            <!--start to page content-->
            <div class="page-content">

                <!--start features-->
                <div class="features-section">
                    <div class="row row-cols-2 row-cols-md-4 g-3">
                        <div class="col d-flex col-12">
                            <div class="card rounded-3 w-100">
                                <a href="store_reports_sales?view=<?php echo $store->store_id; ?>">
                                    <div class="card-body">
                                        <div class="icon-wrapper text-center">
                                            <div class="mb-1 mx-auto">
                                                <img src="../public/images/money.png" class="img-fluid" width="80" alt="" />
                                            </div>
                                            <p class="fw-bold mb-0 text-dark">Today`s Sales <br>
                                                <?php echo "Ksh " . number_format($today_sales, 2); ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-3 w-100">
                                <a href="store_stocks?view=<?php echo $store->store_id; ?>">
                                    <div class="card-body">
                                        <div class="icon-wrapper text-center">
                                            <div class="mb-1 mx-auto">
                                                <img src="../public/images/shopping.png" class="img-fluid" width="80" alt="" />
                                            </div>
                                            <p class="fw-bold mb-0 text-dark">
                                                Total Items <br>
                                                <?php echo $products ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-3 w-100">
                                <a href="store_stocks?view=<?php echo $store->store_id; ?>">
                                    <div class="card-body">
                                        <div class="icon-wrapper text-center">
                                            <div class="mb-1 mx-auto">
                                                <img src="../public/images/empty-cart.png" class="img-fluid" width="80" alt="" />
                                            </div>
                                            <p class="fw-bold mb-0 text-dark">
                                                Out Of Stock <br>
                                                <?php echo $out_of_stock ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
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
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--end trending category-->

            </div>
            <!--end to page content-->

        <?php } ?>

        <!--start to footer-->
        <?php require_once('../partials/pwa_footer_menu.php'); ?>
        <!--end to footer-->

    </div>
    <!--end wrapper-->


    <!--JS Files-->
    <?php require_once('../partials/pwa_scripts.php'); ?>

</body>


</html>