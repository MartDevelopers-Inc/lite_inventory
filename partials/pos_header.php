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
    /* Load Number Of Sales On Hold */
    $query = "SELECT COUNT(DISTINCT hold_sale_number) FROM hold_sales";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($hold_sales_count);
    $stmt->fetch();
    $stmt->close();

?>
    <div class="nk-header nk-header-fluid is-theme">
        <div class="container-xl wide-lg">
            <div class="nk-header-wrap">
                <div class="nk-menu-trigger mr-sm-2 d-lg-none">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-menu"></em></a>
                </div>
                <div class="nk-header-brand">
                    <a href="pos" class="logo-link text-light">
                        <img class="logo-light logo-img" src="../public/images/logo.png" srcset="../public/images/logo.png 2x" alt="logo">
                        <?php echo $settings->system_name; ?>
                    </a>
                </div><!-- .nk-header-brand -->
                <div class="nk-header-menu" data-content="headerNav">
                    <div class="nk-header-mobile">
                        <div class="nk-header-brand">
                            <a href="pos" class="logo-link">
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
                            <a href="pos" class="nk-menu-link">
                                <span class="nk-menu-text">Home</span>
                            </a>
                        </li>
                        <?php
                        /* Pop User Permissions */
                        $ret = "SELECT * FROM  user_permissions ";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->execute(); //ok
                        $res = $stmt->get_result();
                        while ($permissions = $res->fetch_object()) {
                            if ($permissions->permission_module == 'Sales Management') {
                        ?>
                                <li class="nk-menu-item">
                                    <a href="manage_sales" class="nk-menu-link">
                                        <span class="nk-menu-text">Manage Sales</span>
                                    </a>
                                </li>
                            <?php }
                            if ($permissions->permission_module == 'Items Management') { ?>
                                <li class="nk-menu-item">
                                    <a href="items_manage" class="nk-menu-link">
                                        <span class="nk-menu-text">Manage Items</span>
                                    </a>
                                </li>
                            <?php }
                            if ($permissions->permission_module == 'Stocks Management') { ?>
                                <li class="nk-menu-item">
                                    <a href="inventory_manage" class="nk-menu-link">
                                        <span class="nk-menu-text">Inventory</span>
                                    </a>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div><!-- .nk-header-menu -->
                <div class="nk-header-tools">
                    <ul class="nk-quick-nav">
                        <li class="dropdown notification-dropdown">
                            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                <?php if ($hold_sales_count > 0) { ?>
                                    <div class="icon-status icon-status-info">
                                        <em class="icon ni ni-bell"></em>
                                    </div>
                                <?php } else { ?>
                                    <div class="">
                                        <em class="icon ni ni-bell"></em>
                                    </div>
                                <?php } ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                                <div class="dropdown-head">
                                    <span class="sub-title nk-dropdown-title">
                                        Suspended Sales
                                    </span>
                                    <span class="text-right badge badge-dim badge-pill badge-danger">
                                        <?php echo $hold_sales_count; ?>
                                    </span>
                                </div>
                                <div class="dropdown-body">
                                    <div class="nk-notification">
                                        <?php
                                        /* Load Hold Sales */
                                        $ret = "SELECT * FROM hold_sales GROUP BY hold_sale_number 
                                        ORDER BY hold_sale_time DESC";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        while ($hold_sales = $res->fetch_object()) {
                                            /* Load This Hidden */
                                            $hold_sale_number = $hold_sales->hold_sale_number;
                                            $items_sql = mysqli_query($mysqli, "SELECT * FROM hold_sales 
                                            WHERE hold_sale_number = '{$hold_sale_number}'");
                                            $itemArray = array();
                                            while ($row = mysqli_fetch_assoc($items_sql)) {
                                                $itemArray[] = $row;
                                            }
                                        ?>
                                            <div class="nk-notification-item dropdown-inner">
                                                <div class="nk-notification-icon">
                                                    <em class="icon icon-circle bg-warning-dim ni ni-pause-fill"></em>
                                                </div>
                                                <div class="nk-notification-content">
                                                    <div class="nk-notification-text">
                                                        <span>
                                                            Suspended Sale Number #<?php echo $hold_sales->hold_sale_number; ?>
                                                        </span>
                                                    </div>
                                                    <div class="nk-notification-time"><?php echo date('d M Y g:ia', strtotime($hold_sales->hold_sale_time)); ?></div>
                                                    <form method="POST" action="pos">
                                                        <input type="hidden" name="hold_sale_number" value="<?php echo $hold_sales->hold_sale_number; ?>">
                                                        <button class="badge badge-dim badge-pill badge-outline-danger" type="submit" name="restore_sale">
                                                            Unsuspend Sale
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div><!-- .nk-notification -->
                                </div><!-- .nk-dropdown-body -->
                            </div>
                        </li><!-- .dropdown -->
                        <li class="hide-mb-sm"><a href="logout" class="nk-quick-nav-icon"><em class="icon ni ni-signout"></em></a></li>
                        <li class="dropdown user-dropdown order-sm-first">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                                <div class="user-info d-none d-xl-block">
                                    <div class="user-status user-status-unverified"><?php echo $settings->user_access_level; ?></div>
                                    <div class="user-name"><?php echo $settings->user_name; ?></div>
                                </div>
                            </div>
                        </li><!-- .dropdown -->
                    </ul><!-- .nk-quick-nav -->
                </div><!-- .nk-header-tools -->
            </div><!-- .nk-header-wrap -->
        </div><!-- .container-fliud -->
    </div>
<?php } ?>