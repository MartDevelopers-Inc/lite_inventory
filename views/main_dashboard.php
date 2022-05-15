<?php
/*
 * Created on Sat May 14 2022
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
check_login();
require_once('../partials/head.php');
/* Load Analytics */
require_once('../helpers/admin_analytics.php');
?>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?php require_once('../partials/sidebar.php'); ?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php require_once('../partials/header.php'); ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Investment Dashboard</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to Crypto Invest Dashboard</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-download-cloud"></em><span>Export</span></a></li>
                                                        <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                                        <li class="nk-block-tools-opt">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><em class="icon ni ni-user-add-fill"></em><span>Add User</span></a></li>
                                                                        <li><a href="#"><em class="icon ni ni-coin-alt-fill"></em><span>Add Order</span></a></li>
                                                                        <li><a href="#"><em class="icon ni ni-note-add-fill-c"></em><span>Add Page</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div><!-- .toggle-expand-content -->
                                            </div><!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-md-4">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Total Deposit</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Deposited"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> 49,595.34 <span class="currency currency-usd">USD</span>
                                                        </span>
                                                        <span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span>
                                                    </div>
                                                    <div class="invest-data">
                                                        <div class="invest-data-amount g-2">
                                                            <div class="invest-data-history">
                                                                <div class="title">This Month</div>
                                                                <div class="amount">2,940.59 <span class="currency currency-usd">USD</span></div>
                                                            </div>
                                                            <div class="invest-data-history">
                                                                <div class="title">This Week</div>
                                                                <div class="amount">1,259.28 <span class="currency currency-usd">USD</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="invest-data-ck">
                                                            <canvas class="iv-data-chart" id="totalDeposit"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-4">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Total Withdraw</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Withdraw"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> 49,595.34 <span class="currency currency-usd">USD</span>
                                                        </span>
                                                        <span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span>
                                                    </div>
                                                    <div class="invest-data">
                                                        <div class="invest-data-amount g-2">
                                                            <div class="invest-data-history">
                                                                <div class="title">This Month</div>
                                                                <div class="amount">2,940.59 <span class="currency currency-usd">USD</span></div>
                                                            </div>
                                                            <div class="invest-data-history">
                                                                <div class="title">This Week</div>
                                                                <div class="amount">1,259.28 <span class="currency currency-usd">USD</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="invest-data-ck">
                                                            <canvas class="iv-data-chart" id="totalWithdraw"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-4">
                                            <div class="card card-bordered  card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Balance in Account</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Balance in Account"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> 79,358.50 <span class="currency currency-usd">USD</span>
                                                        </span>
                                                    </div>
                                                    <div class="invest-data">
                                                        <div class="invest-data-amount g-2">
                                                            <div class="invest-data-history">
                                                                <div class="title">This Month</div>
                                                                <div class="amount">2,940.59 <span class="currency currency-usd">USD</span></div>
                                                            </div>
                                                            <div class="invest-data-history">
                                                                <div class="title">This Week</div>
                                                                <div class="amount">1,259.28 <span class="currency currency-usd">USD</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="invest-data-ck">
                                                            <canvas class="iv-data-chart" id="totalBalance"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-6 col-xxl-4">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group mb-1">
                                                        <div class="card-title">
                                                            <h6 class="title">Investment Overview</h6>
                                                            <p>The investment overview of your platform. <a href="#">All Investment</a></p>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs nav-tabs-card nav-tabs-xs">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#overview">Overview</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#thisyear">This Year</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#alltime">All Time</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content mt-0">
                                                        <div class="tab-pane active" id="overview">
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Currently Actived Investment</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">49,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Amount</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount">56</span><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span></div>
                                                                        <div class="title">Plans</div>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">49,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Paid Profit</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Investment in this Month</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">49,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Amount</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount">23</span><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                                                                        <div class="title">Plans</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="thisyear">
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Currently Actived Investment</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">89,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Amount</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount">96</span><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span></div>
                                                                        <div class="title">Plans</div>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">99,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Paid Profit</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Investment in this Month</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">149,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Amount</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount">83</span><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                                                                        <div class="title">Plans</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="alltime">
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Currently Actived Investment</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">249,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Amount</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount">556</span><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span></div>
                                                                        <div class="title">Plans</div>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">149,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Paid Profit</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Investment in this Month</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">249,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Amount</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount">223</span><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                                                                        <div class="title">Plans</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                        <div class="col-md-6 col-xxl-4">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner d-flex flex-column h-100">
                                                    <div class="card-title-group mb-3">
                                                        <div class="card-title">
                                                            <h6 class="title">Top Invested Plan</h6>
                                                            <p>In last 30 days top invested schemes.</p>
                                                        </div>
                                                        <div class="card-tools mt-n4 mr-n1">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>15 Days</span></a></li>
                                                                        <li><a href="#" class="active"><span>30 Days</span></a></li>
                                                                        <li><a href="#"><span>3 Months</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-list gy-3">
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Strater Plan</div>
                                                                <div class="progress-amount">58%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar" data-progress="58"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Silver Plan</div>
                                                                <div class="progress-amount">18.49%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-orange" data-progress="18.49"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Dimond Plan</div>
                                                                <div class="progress-amount">16%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-teal" data-progress="16"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Platinam Plan</div>
                                                                <div class="progress-amount">29%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-pink" data-progress="29"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Vibranium Plan</div>
                                                                <div class="progress-amount">33%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-azure" data-progress="33"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="invest-top-ck mt-auto">
                                                        <canvas class="iv-plan-purchase" id="planPurchase"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                        <div class="col-md-6 col-xxl-4">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Recent Activities</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <ul class="card-tools-nav">
                                                                <li><a href="#"><span>Cancel</span></a></li>
                                                                <li class="active"><a href="#"><span>All</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="nk-activity">
                                                    <li class="nk-activity-item">
                                                        <div class="nk-activity-media user-avatar bg-success"><img src="./images/avatar/c-sm.jpg" alt=""></div>
                                                        <div class="nk-activity-data">
                                                            <div class="label">Keith Jensen requested to Widthdrawl.</div>
                                                            <span class="time">2 hours ago</span>
                                                        </div>
                                                    </li>
                                                    <li class="nk-activity-item">
                                                        <div class="nk-activity-media user-avatar bg-warning">HS</div>
                                                        <div class="nk-activity-data">
                                                            <div class="label">Harry Simpson placed a Order.</div>
                                                            <span class="time">2 hours ago</span>
                                                        </div>
                                                    </li>
                                                    <li class="nk-activity-item">
                                                        <div class="nk-activity-media user-avatar bg-azure">SM</div>
                                                        <div class="nk-activity-data">
                                                            <div class="label">Stephanie Marshall got a huge bonus.</div>
                                                            <span class="time">2 hours ago</span>
                                                        </div>
                                                    </li>
                                                    <li class="nk-activity-item">
                                                        <div class="nk-activity-media user-avatar bg-purple"><img src="./images/avatar/d-sm.jpg" alt=""></div>
                                                        <div class="nk-activity-data">
                                                            <div class="label">Nicholas Carr deposited funds.</div>
                                                            <span class="time">2 hours ago</span>
                                                        </div>
                                                    </li>
                                                    <li class="nk-activity-item">
                                                        <div class="nk-activity-media user-avatar bg-pink">TM</div>
                                                        <div class="nk-activity-data">
                                                            <div class="label">Timothy Moreno placed a Order.</div>
                                                            <span class="time">2 hours ago</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-6 col-xxl-4">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Notifications</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <a href="html/subscription/tickets.html" class="link">View All</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-inner">
                                                    <div class="timeline">
                                                        <h6 class="timeline-head">November, 2019</h6>
                                                        <ul class="timeline-list">
                                                            <li class="timeline-item">
                                                                <div class="timeline-status bg-primary is-outline"></div>
                                                                <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em></div>
                                                                <div class="timeline-data">
                                                                    <h6 class="timeline-title">Submited KYC Application</h6>
                                                                    <div class="timeline-des">
                                                                        <p>Re-submitted KYC Application form.</p>
                                                                        <span class="time">09:30am</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="timeline-item">
                                                                <div class="timeline-status bg-primary"></div>
                                                                <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em></div>
                                                                <div class="timeline-data">
                                                                    <h6 class="timeline-title">Submited KYC Application</h6>
                                                                    <div class="timeline-des">
                                                                        <p>Re-submitted KYC Application form.</p>
                                                                        <span class="time">09:30am</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="timeline-item">
                                                                <div class="timeline-status bg-pink"></div>
                                                                <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em></div>
                                                                <div class="timeline-data">
                                                                    <h6 class="timeline-title">Submited KYC Application</h6>
                                                                    <div class="timeline-des">
                                                                        <p>Re-submitted KYC Application form.</p>
                                                                        <span class="time">09:30am</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xl-12 col-xxl-8">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Recent Investment</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <a href="#" class="link">View All</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>Plan</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Who</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span>Date</span></div>
                                                        <div class="nk-tb-col"><span>Amount</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>&nbsp;</span></div>
                                                        <div class="nk-tb-col"><span>&nbsp;</span></div>
                                                    </div>
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <div class="align-center">
                                                                <div class="user-avatar user-avatar-sm bg-light">
                                                                    <span>P1</span>
                                                                </div>
                                                                <span class="tb-sub ml-2">Silver <span class="d-none d-md-inline">- Daily 4.76% for 21 Days</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <div class="user-card">
                                                                <div class="user-avatar user-avatar-xs bg-pink-dim">
                                                                    <span>JC</span>
                                                                </div>
                                                                <div class="user-name">
                                                                    <span class="tb-lead">Janice Carroll</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span class="tb-sub">18/10/2019</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount">1.094780 <span>BTC</span></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <div class="progress progress-sm w-80px">
                                                                <div class="progress-bar" data-progress="75"></div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-col-action">
                                                            <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-chevron-right"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li><a href="#">View</a></li>
                                                                        <li><a href="#">Invoice</a></li>
                                                                        <li><a href="#">Print</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <div class="align-center">
                                                                <div class="user-avatar user-avatar-sm bg-light">
                                                                    <span>P2</span>
                                                                </div>
                                                                <span class="tb-sub ml-2">Dimond <span class="d-none d-md-inline">- Daily 8.52% for 14 Days</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <div class="user-card">
                                                                <div class="user-avatar user-avatar-xs bg-azure-dim">
                                                                    <span>VA</span>
                                                                </div>
                                                                <div class="user-name">
                                                                    <span class="tb-lead">Victoria Aguilar</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span class="tb-sub">18/10/2019</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount">1.094780 <span>BTC</span></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span class="tb-sub text-success">Completed</span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-col-action">
                                                            <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-chevron-right"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li><a href="#">View</a></li>
                                                                        <li><a href="#">Invoice</a></li>
                                                                        <li><a href="#">Print</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <div class="align-center">
                                                                <div class="user-avatar user-avatar-sm bg-light">
                                                                    <span>P3</span>
                                                                </div>
                                                                <span class="tb-sub ml-2">Platinam <span class="d-none d-md-inline">- Daily 14.82% for 7 Days</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <div class="user-card">
                                                                <div class="user-avatar user-avatar-xs bg-purple-dim">
                                                                    <span>EH</span>
                                                                </div>
                                                                <div class="user-name">
                                                                    <span class="tb-lead">Emma Henry</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span class="tb-sub">18/10/2019</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount">1.094780 <span>BTC</span></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span class="tb-sub text-success">Completed</span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-col-action">
                                                            <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-chevron-right"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li><a href="#">View</a></li>
                                                                        <li><a href="#">Invoice</a></li>
                                                                        <li><a href="#">Print</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <div class="align-center">
                                                                <div class="user-avatar user-avatar-sm bg-light">
                                                                    <span>P1</span>
                                                                </div>
                                                                <span class="tb-sub ml-2">Silver <span class="d-none d-md-inline">- Daily 4.76% for 21 Days</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <div class="user-card">
                                                                <div class="user-avatar user-avatar-xs bg-teal-dim">
                                                                    <span>AF</span>
                                                                </div>
                                                                <div class="user-name">
                                                                    <span class="tb-lead">Alice Ford</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span class="tb-sub">18/10/2019</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount">1.094780 <span>BTC</span></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span class="tb-sub text-success">Completed</span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-col-action">
                                                            <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-chevron-right"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li><a href="#">View</a></li>
                                                                        <li><a href="#">Invoice</a></li>
                                                                        <li><a href="#">Print</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <div class="align-center">
                                                                <div class="user-avatar user-avatar-sm bg-light">
                                                                    <span>P3</span>
                                                                </div>
                                                                <span class="tb-sub ml-2">Platinam <span class="d-none d-md-inline">- Daily 14.82% for 7 Days</span></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <div class="user-card">
                                                                <div class="user-avatar user-avatar-xs bg-orange-dim">
                                                                    <span>HW</span>
                                                                </div>
                                                                <div class="user-name">
                                                                    <span class="tb-lead">Harold Walker</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span class="tb-sub">18/10/2019</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount">1.094780 <span>BTC</span></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span class="tb-sub text-success">Completed</span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-col-action">
                                                            <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-chevron-right"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li><a href="#">View</a></li>
                                                                        <li><a href="#">Invoice</a></li>
                                                                        <li><a href="#">Print</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <?php require_once('../partials/footer.php'); ?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>