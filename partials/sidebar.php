<?php
/*
 * Created on Sun May 15 2022
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
                    <img class="logo-light logo-img" src="../public/images/logo.png" srcset="../public/images/logo.png 2x" alt="logo">
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
                        <?php
                        /* Show This If Loyalty Points Has Been Allowed */
                        $ret = "SELECT * FROM receipt_customization";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->execute(); //ok
                        $res = $stmt->get_result();
                        while ($receipt_settings = $res->fetch_object()) {
                            if ($receipt_settings->allow_loyalty_points == 'true') {
                        ?>
                                <li class="nk-menu-item">
                                    <a href="main_dashboard_manage_vouchers" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-cc-new"></em></span>
                                        <span class="nk-menu-text">Vouchers</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                        <?php }
                        } ?>
                        <li class="nk-menu-item">
                            <a href="main_dashboard_manage_sales" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-cart"></em></span>
                                <span class="nk-menu-text">Sales</span>
                            </a>
                        </li><!-- .nk-menu-item -->

                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Reports</h6>
                        </li><!-- .nk-menu-heading -->
                        <li class="nk-menu-item">
                            <a href="main_dashboard_reports_sales" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                <span class="nk-menu-text">Sales Reports</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="main_dashboard_reports_stocks" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-list"></em></span>
                                <span class="nk-menu-text">Stock Reports</span>
                            </a>
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