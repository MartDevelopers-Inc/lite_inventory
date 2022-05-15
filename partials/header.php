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
    <div class="nk-header nk-header-fixed is-light">
        <div class="container-fluid">
            <div class="nk-header-wrap">
                <div class="nk-menu-trigger d-xl-none ml-n1">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                </div>
                <div class="nk-header-brand d-xl-none">
                    <a href="main_dashboard" class="logo-link">
                        <img class="logo-light logo-img" src="../public/images/logo.png" srcset="../public/images/logo.png 2x" alt="logo">
                        <span class="nio-version"><?php echo $settings->system_name; ?></span>
                    </a>
                </div><!-- .nk-header-brand -->
                <div class="nk-header-news d-none d-xl-block">
                    <div class="nk-news-list">
                    </div>
                </div><!-- .nk-header-news -->
                <div class="nk-header-tools">
                    <ul class="nk-quick-nav">
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="user-toggle">
                                    <div class="user-avatar sm">
                                        <em class="icon ni ni-user-alt"></em>
                                    </div>
                                    <div class="user-info d-none d-md-block">
                                        <div class="user-status"><?php echo $settings->user_access_level; ?></div>
                                        <div class="user-name dropdown-indicator"><?php echo $settings->user_name; ?></div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            <span><?php echo substr($settings->user_name, 0, 2); ?></span>
                                        </div>
                                        <div class="user-info">
                                            <span class="lead-text"><?php echo $settings->user_name; ?></span>
                                            <span class="sub-text"><?php echo $settings->user_email; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a href="main_dashboard_profile_settings"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a href="logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li><!-- .dropdown -->
                        <li class="dropdown notification-dropdown mr-n1">
                            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                                <div class="dropdown-head">
                                    <span class="sub-title nk-dropdown-title">Notifications</span>
                                </div>
                                <div class="dropdown-body">
                                    <?php
                                    /* Fetch List Of All Products Which Are Low On Stock */
                                    $ret = "SELECT  * FROM `products` 
                                    WHERE product_quantity <= 1 
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

                                </div><!-- .nk-dropdown-body -->
                                <div class="dropdown-foot center">
                                    <a href="main_dashboard_inventory_reports">View All</a>
                                </div>
                            </div>
                        </li><!-- .dropdown -->
                    </ul><!-- .nk-quick-nav -->
                </div><!-- .nk-header-tools -->
            </div><!-- .nk-header-wrap -->
        </div><!-- .container-fliud -->
    </div>
<?php } ?>