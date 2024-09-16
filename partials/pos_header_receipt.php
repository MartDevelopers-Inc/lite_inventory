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
                    <a href="pos?store=<?php echo $settings->user_store_id; ?>&action=empty" class="logo-link text-light">
                        <img class="logo-light logo-img" src="../public/images/logo.png" srcset="../public/images/logo.png 2x" alt="logo">
                        <?php echo $settings->system_name; ?>
                    </a>
                </div><!-- .nk-header-brand -->
                <div class="nk-header-menu" data-content="headerNav">
                    <div class="nk-header-mobile">
                        <div class="nk-header-brand">
                            <a href="pos?store=<?php echo $settings->user_store_id; ?>&action=empty" class="logo-link">
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
                            <a href="pos?store=<?php echo $settings->user_store_id; ?>&action=empty" class="nk-menu-link">
                                <span class="nk-menu-text"> <em class="icon ni ni-home"></em> Home</span>
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
                                    <a href="manage_sales?store=<?php echo $settings->user_store_id; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text"> <em class="icon ni ni-cart-fill"></em> Sales</span>
                                    </a>
                                </li>
                            <?php }
                            if ($permissions->permission_module == 'Items Management') { ?>
                                <li class="nk-menu-item">
                                    <a href="items_manage?store=<?php echo $settings->user_store_id; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text"> <em class="icon ni ni-package"></em>Items</span>
                                    </a>
                                </li>
                            <?php }
                            if ($permissions->permission_module == 'Stocks Management') { ?>
                                <li class="nk-menu-item">
                                    <a href="inventory_manage?store=<?php echo $settings->user_store_id; ?>" class="nk-menu-link">
                                        <span class="nk-menu-text"> <em class="icon ni ni-inbox-fill"></em>Inventory & Stock</span>
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
                                                    <form method="POST" action="pos?store=<?php echo $settings->user_store_id; ?>">
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
            </div><!-- .nk-header-menu -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
<?php } ?>