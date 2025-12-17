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

/* Load System Settings */
$user_id = $_SESSION['user_id'];
$ret = "SELECT * FROM  system_settings JOIN users WHERE user_id = '{$user_id}' ";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($settings = $res->fetch_object()) {
?>
    <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
        <div class="nk-sidebar-element nk-sidebar-head">
            <div class="nk-sidebar-brand">
                <a href="home" class="logo-link nk-sidebar-logo text-light">
                    <img class="logo-light logo-img" src="https://nativebeecare.co.ke/assets/img/logo/favicon.png" srcset="https://nativebeecare.co.ke/assets/img/logo/favicon.png 2x" alt="logo">
                    <?php echo $settings->system_name; ?>
                </a>
            </div>
            <div class="nk-menu-trigger mr-n2">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            </div>
        </div><!-- .nk-sidebar-element -->
        <div class="nk-sidebar-element">
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-menu" data-simplebar>
                    <ul class="nk-menu">
                        <li class="nk-menu-item">
                            <a href="home" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="main_dashboard_stores" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-grid-plus-fill"></em></span>
                                <span class="nk-menu-text">Stores</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-package-fill"></em></span>
                                <span class="nk-menu-text">Items & Products</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="main_dashboard_import_items" class="nk-menu-link"><span class="nk-menu-text">Bulk Import</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="main_dashboard_manage_items" class="nk-menu-link"><span class="nk-menu-text">Manage Products</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-list-check"></em></span>
                                <span class="nk-menu-text">Inventory</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="main_dashboard_manage_stock" class="nk-menu-link"><span class="nk-menu-text">Manage Stock</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-list-fill"></em></span>
                                <span class="nk-menu-text">Workforce</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="main_dashboard_import_staff" class="nk-menu-link"><span class="nk-menu-text">Bulk Import</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="main_dashboard_manage_staffs" class="nk-menu-link"><span class="nk-menu-text">Manage Staffs</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="main_dashboard_manage_vouchers" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-cc-new"></em></span>
                                <span class="nk-menu-text">Vouchers</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="main_dashboard_manage_sales" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-cart"></em></span>
                                <span class="nk-menu-text">Sales</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="main_dashboard_expenses" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-calc"></em></span>
                                <span class="nk-menu-text">Expenses</span>
                            </a>
                        </li><!-- .nk-menu-item -->


                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Reports</h6>
                        </li><!-- .nk-menu-heading -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                <span class="nk-menu-text">Sales</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="main_dashboard_reports_sales" class="nk-menu-link"><span class="nk-menu-text">Overall Sales</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="main_dashboard_reports_item_based_sales" class="nk-menu-link"><span class="nk-menu-text">Item Based</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="main_dashboard_reports_expenses" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                <span class="nk-menu-text">Expenses Reports</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="main_dashboard_reports_pl_statements" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                                <span class="nk-menu-text">P&L Statements</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="main_dashboard_reports_income_statements" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-note-add-c"></em></span>
                                <span class="nk-menu-text">Income Statements</span>
                            </a>
                        </li>
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-list"></em></span>
                                <span class="nk-menu-text">Stock Reports</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="main_dashboard_reports_stocks" class="nk-menu-link"><span class="nk-menu-text">Current Stock</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="main_dashboard_reports_stock_additions" class="nk-menu-link"><span class="nk-menu-text">Stock Additions</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="main_dashboard_reports_logs" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-activity-alt"></em></span>
                                <span class="nk-menu-text">System Logs</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <?php
                        if ($settings->user_access_level == 'Admin') {
                            /* Show Admin This */
                        ?>
                            <li class="nk-menu-heading">
                                <h6 class="overline-title text-primary-alt">Core System Settings</h6>
                            </li><!-- .nk-menu-heading -->
                            <li class="nk-menu-item">
                                <a href="main_dashboard_settings_restock" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-clipboad-check-fill"></em></span>
                                    <span class="nk-menu-text">Restock Limits</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-opt-dot-alt"></em></span>
                                    <span class="nk-menu-text">System Configs</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <!-- 
                                    <li class="nk-menu-item">
                                        <a href="main_dashboard_payment_settings" class="nk-menu-link"><span class="nk-menu-text">Payment Settings</span></a>
                                    </li> -->
                                    <li class="nk-menu-item">
                                        <a href="main_dashboard_settings_receipt" class="nk-menu-link"><span class="nk-menu-text">Receipt & Sales Settings</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="main_dashboard_settings_permissions" class="nk-menu-link"><span class="nk-menu-text">Permissions</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="main_dashboard_settings_customizations" class="nk-menu-link"><span class="nk-menu-text">Customizations</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="main_dashboard_settings_mailer" class="nk-menu-link"><span class="nk-menu-text">STMP Mailer Settings</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="main_dashboard_settings_backups" class="nk-menu-link"><span class="nk-menu-text">Database Backups</span></a>
                                    </li>
                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->
                        <?php } ?>
                    </ul>
                </div><!-- .nk-sidebar-menu -->
            </div><!-- .nk-sidebar-content -->
        </div><!-- .nk-sidebar-element -->
    </div>
<?php } ?>