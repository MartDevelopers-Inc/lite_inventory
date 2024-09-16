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

$view = $_GET['view'];
$user_id = $_SESSION['user_id'];
$ret = "SELECT * FROM  system_settings 
JOIN users JOIN store_settings 
WHERE user_id = '{$user_id}' AND store_id = '{$view}'";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($settings = $res->fetch_object()) {

?>
    <div class="nk-header nk-header-fluid is-theme">
        <div class="container-xl wide-lg">
            <div class="nk-header-wrap">
                <div class="nk-menu-trigger mr-sm-2 d-lg-none">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-menu"></em></a>
                </div>
                <div class="nk-header-brand">
                    <a href="store_dashboard?view=<?php echo $view; ?>" class="logo-link text-light">
                        <img class="logo-light logo-img" src="https://nativebeecare.co.ke/assets/img/logo/favicon.png" srcset="https://nativebeecare.co.ke/assets/img/logo/favicon.png 2x" alt="logo">
                        <?php echo $settings->system_name; ?>
                    </a>
                </div><!-- .nk-header-brand -->
                <div class="nk-header-menu" data-content="headerNav">
                    <div class="nk-header-mobile">
                        <div class="nk-header-brand">
                            <a href="store_dashboard?view=<?php echo $view; ?>" class="logo-link">
                                <img class="logo-light logo-img" src="https://nativebeecare.co.ke/assets/img/logo/favicon.png" srcset="https://nativebeecare.co.ke/assets/img/logo/favicon.png 2x" alt="logo">
                                <?php echo $settings->system_name; ?>
                            </a>
                        </div>
                        <div class="nk-menu-trigger mr-n2">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-arrow-left"></em></a>
                        </div>
                    </div>
                    <!-- Menu -->
                    <ul class="nk-menu nk-menu-main">
                        <?php
                        if ($settings->user_access_level == 'Admin') {
                        ?>
                            <li class="nk-menu-item">
                                <a href="main_dashboard_stores" class="nk-menu-link">
                                    <span class="nk-menu-text"> Home</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nk-menu-item">
                            <a href="store_dashboard?view=<?php echo $view; ?>" class="nk-menu-link">
                                <span class="nk-menu-text"> Store Home</span>
                            </a>
                        </li>
                        <li class="nk-menu-item active has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-text"> Items</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="store_items_bulk_import?view=<?php echo $view; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text"> Bulk Import</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="store_items_manage?view=<?php echo $view; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text"> Manage</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="store_items_inventory?view=<?php echo $view; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text"> Inventory</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nk-menu-item active has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-text">Sales</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="store_sales_manage?view=<?php echo $view; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Manage Sales</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="store_expenses_manage?view=<?php echo $view; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Manage Expenses</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="store_sales_vouchers?view=<?php echo $view; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Vouchers</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nk-menu-item active has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-text">Reports</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="store_reports_sales?view=<?php echo $view; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Sales</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="store_reports_p_l_statements?view=<?php echo $view; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">P&L Statements</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="store_reports_stock?view=<?php echo $view; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Current Stock</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="store_reports_stock_additions?view=<?php echo $view; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Stock Additions</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="store_reports_expenses?view=<?php echo $view; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Expenses</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="store_reports_income_statements?view=<?php echo $view; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Income Statements</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nk-menu-item active has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-text">Settings</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="store_restock_limits?view=<?php echo $view; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Restock Limits</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="store_receipt_settings?view=<?php echo $view; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">Receipt And Sales</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- .nk-header-menu -->
                <div class="nk-header-tools">
                    <ul class="nk-quick-nav">
                        <li class="dropdown notification-dropdown">
                            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                                <div class="dropdown-head">
                                    <span class="sub-title nk-dropdown-title">
                                        Out Of Stock Items
                                    </span>
                                </div>
                                <div class="dropdown-body">
                                    <div class="nk-notification">
                                        <?php
                                        /* Fetch List Of All Products Which Are Low On Stock */
                                        $ret = "SELECT  * FROM `products` 
                                        WHERE product_quantity <= 1  AND product_store_id = '{$view}'
                                        ORDER BY product_name DESC
                                        LIMIT 5 ";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        while ($product = $res->fetch_object()) {
                                        ?>
                                            <div class="nk-notification">
                                                <div class="nk-notification-item dropdown-inner">
                                                    <div class="nk-notification-icon">
                                                        <em class="icon icon-circle bg-warning-dim ni ni-alert"></em>
                                                    </div>
                                                    <div class="nk-notification-content">
                                                        <div class="nk-notification-text">
                                                            <span class="text-danger"><?php echo $product->product_code . ' ' . $product->product_name; ?> </span> is out of stock, kindly plan to restock it.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-notification -->
                                        <?php } ?>

                                    </div><!-- .nk-notification -->
                                </div><!-- .nk-dropdown-body -->
                                <div class="dropdown-foot center">
                                    <a href="store_reports_stock?view=<?php echo $view; ?>">View All</a>
                                </div>
                            </div>
                        </li><!-- .dropdown -->
                        <li class="hide-mb-sm"><a href="logout" class="nk-quick-nav-icon"><em class="icon ni ni-signout"></em></a></li>
                    </ul><!-- .nk-quick-nav -->
                </div><!-- .nk-header-tools -->
            </div><!-- .nk-header-wrap -->
        </div><!-- .container-fliud -->
    </div>
<?php } ?>