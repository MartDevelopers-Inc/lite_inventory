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

$user_id = $_SESSION['user_id'];
$ret = "SELECT * FROM  system_settings 
JOIN users WHERE user_id = '{$user_id}' ";
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
                    <a href="pos" class="logo-link">
                        <img class="logo-light logo-img" src="../public/images/logo.png" srcset="../public/images/logo.png 2x" alt="logo">
                        <?php echo $settings->system_name; ?>
                    </a>
                </div><!-- .nk-header-brand -->
                <div class="nk-header-menu" data-content="headerNav">
                    <div class="nk-header-mobile">
                        <div class="nk-header-brand">
                            <a href="html/index.html" class="logo-link">
                                <img class="logo-light logo-img" src="../public/images/logo.png" srcset="../public/images/logo.png 2x" alt="logo">
                                <?php echo $settings->system_name; ?>
                            </a>
                        </div>
                        <div class="nk-menu-trigger mr-n2">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-arrow-left"></em></a>
                        </div>
                    </div>
                    <!-- Menu -->
                    <ul class="nk-menu nk-menu-main">
                        <li class="nk-menu-item">
                            <a href="html/invest/index.html" class="nk-menu-link">
                                <span class="nk-menu-text">Overview</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="html/invest/schemes.html" class="nk-menu-link">
                                <span class="nk-menu-text">MY Plan</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="html/invest/invest.html" class="nk-menu-link">
                                <span class="nk-menu-text">Invest</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="html/invest/profile.html" class="nk-menu-link">
                                <span class="nk-menu-text">Profile</span>
                            </a>
                        </li>
                        <li class="nk-menu-item active has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-text">Pages</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="html/invest/welcome.html" class="nk-menu-link">
                                        <span class="nk-menu-text">Welcome / Intro</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="html/invest/invest-form.html" class="nk-menu-link">
                                        <span class="nk-menu-text">Investment Process</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="html/invest/scheme-details.html" class="nk-menu-link">
                                        <span class="nk-menu-text">Investment Details</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="html/invest/kyc-application.html" class="nk-menu-link">
                                        <span class="nk-menu-text">KYC - Get Started</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="html/invest/kyc-form.html" class="nk-menu-link">
                                        <span class="nk-menu-text">KYC - Application Form</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-text">Auth Pages <em class="icon ni ni-external"></em> </span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/auths/auth-login.html" target="_blank" class="nk-menu-link">
                                                <span class="nk-menu-text">Login / Sign in</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/auths/auth-register.html" target="_blank" class="nk-menu-link">
                                                <span class="nk-menu-text">Register / Sign up</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/auths/auth-reset.html" target="_blank" class="nk-menu-link">
                                                <span class="nk-menu-text">Forgot Password</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/auths/auth-success.html" target="_blank" class="nk-menu-link">
                                                <span class="nk-menu-text">Success / Confirm</span>
                                            </a>
                                        </li>
                                    </ul>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-text">Dashboard <em class="icon ni ni-external"></em> </span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/crypto/index.html" target="_blank" class="nk-menu-link">
                                                <span class="nk-menu-text">Crypto - Buy Sell</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/index.html" target="_blank" class="nk-menu-link">
                                                <span class="nk-menu-text">General Dashboard</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/subscription/index.html" target="_blank" class="nk-menu-link">
                                                <span class="nk-menu-text">Subscription - SaaS</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="html/general/components.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                                        <span class="nk-menu-text">Components</span>
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
                                    <span class="sub-title nk-dropdown-title">Notifications</span>
                                    <a href="#">Mark All as Read</a>
                                </div>
                                <div class="dropdown-body">
                                    <div class="nk-notification">
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-icon">
                                                <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                            </div>
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                <div class="nk-notification-time">2 hrs ago</div>
                                            </div>
                                        </div>
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-icon">
                                                <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                            </div>
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                <div class="nk-notification-time">2 hrs ago</div>
                                            </div>
                                        </div>
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-icon">
                                                <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                            </div>
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                <div class="nk-notification-time">2 hrs ago</div>
                                            </div>
                                        </div>
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-icon">
                                                <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                            </div>
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                <div class="nk-notification-time">2 hrs ago</div>
                                            </div>
                                        </div>
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-icon">
                                                <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                            </div>
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                <div class="nk-notification-time">2 hrs ago</div>
                                            </div>
                                        </div>
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-icon">
                                                <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                            </div>
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                <div class="nk-notification-time">2 hrs ago</div>
                                            </div>
                                        </div>
                                    </div><!-- .nk-notification -->
                                </div><!-- .nk-dropdown-body -->
                                <div class="dropdown-foot center">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </li><!-- .dropdown -->
                        <li class="hide-mb-sm"><a href="#" class="nk-quick-nav-icon"><em class="icon ni ni-signout"></em></a></li>
                        <li class="dropdown user-dropdown order-sm-first">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="user-toggle">
                                    <div class="user-avatar sm">
                                        <em class="icon ni ni-user-alt"></em>
                                    </div>
                                    <div class="user-info d-none d-xl-block">
                                        <div class="user-status user-status-unverified">Unverified</div>
                                        <div class="user-name dropdown-indicator">Abu Bin Ishityak</div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1 is-light">
                                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            <span>AB</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="lead-text">Abu Bin Ishtiyak</span>
                                            <span class="sub-text">info@softnio.com</span>
                                        </div>
                                        <div class="user-action">
                                            <a class="btn btn-icon mr-n2" href="html/invest/profile-setting.html"><em class="icon ni ni-setting"></em></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-inner user-account-info">
                                    <h6 class="overline-title-alt">Account Balance</h6>
                                    <div class="user-balance">1,494.23 <small class="currency currency-usd">USD</small></div>
                                    <div class="user-balance-sub">Locked <span>15,495.39 <span class="currency currency-usd">USD</span></span></div>
                                    <a href="#" class="link"><span>Withdraw Balance</span> <em class="icon ni ni-wallet-out"></em></a>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a href="html/invest/profile.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                        <li><a href="html/invest/profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                        <li><a href="html/invest/profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li><!-- .dropdown -->
                    </ul><!-- .nk-quick-nav -->
                </div><!-- .nk-header-tools -->
            </div><!-- .nk-header-wrap -->
        </div><!-- .container-fliud -->
    </div>
<?php } ?>