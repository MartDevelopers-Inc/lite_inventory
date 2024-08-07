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
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../config/dbcontroller.php');
require_once('../config/codeGen.php');
require_once('../vendor/autoload.php');
check_login();
/* Initiate DB Controller */
$store = $_GET['store'];/* Store Details */
$db_handle = new DBController();
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE product_id='" . $_GET["product_id"] . "'");
                /* Fetch All Products And Add Them In An Array */
                if (!empty($_POST['Discount'])) {
                    /* Check If Discount Is Empty */
                    $Discount = $_POST['Discount'];
                    /* Hold Discount */
                } else {
                    $Discount = 0;
                }
                $itemArray = array(
                    $productByCode[0]["product_code"] => array(
                        'product_name' => $productByCode[0]["product_name"],
                        'product_code' => $productByCode[0]["product_code"],
                        'quantity' => $_POST["quantity"],
                        'product_sale_price' => ($productByCode[0]["product_sale_price"] - $Discount),
                        'product_description' => $productByCode[0]["product_description"],
                        'product_id' => $productByCode[0]["product_id"],
                        'product_quantity_limit' => $productByCode[0]["product_quantity_limit"],
                        'Discount' => $Discount
                    )
                );

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["product_code"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["product_code"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;

        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["product_code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
if (isset($_POST['add_sale'])) {
    $sale_payment_method = $_POST['sale_payment_method'];
    $cart_products = $_SESSION["cart_item"];
    /* Load Sale Helper */
    if ($sale_payment_method == 'Cash') {
        include('../helpers/cashsale_helper.php');
    } else if ($sale_payment_method == 'MPESA') {
        include('../helpers/mpesa_helper.php');
    } else {
        include('../helpers/card_helper.php');
    }
}

/* Hold This Sale */
if (isset($_POST['hold_sale'])) {
    /* Load Hold Sale Helper */
    $cart_products = $_SESSION["cart_item"];
    include('../helpers/holdsale_helper.php');
}

/* Restore Hold Sales */
if (isset($_POST['restore_sale'])) {
    $hold_sale_number = mysqli_real_escape_string($mysqli, $_POST['hold_sale_number']);
    $items_sql = mysqli_query($mysqli, "SELECT * FROM hold_sales WHERE hold_sale_number = '{$hold_sale_number}'");
    $itemArray = array();
    while ($row = mysqli_fetch_assoc($items_sql)) {
        $itemArray[] = $row;
    }
    /* Clear Everything From Hold Sales */
    $sql = "DELETE FROM hold_sales WHERE hold_sale_number = '{$hold_sale_number}'";
    $prepare = $mysqli->prepare($sql);
    $prepare->execute();
    /* Add Everything To The Items */
    $_SESSION["cart_item"] = $itemArray;
    /* Show An Alert That sale has been unsuspended */
    $_SESSION['success'] = "Sale Number #$hold_sale_number Is Restored To Cart";
    header("Location: pos?store=$store");
    exit();
}
require_once('../partials/head.php');
?>

<body class="nk-body npc-invest bg-lighter ">
    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <?php require_once('../partials/pos_header.php'); ?>
            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content nk-content-lg nk-content-fluid">
                <div class="container-xl wide-lg">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head">
                                <div class="nk-block-between-md g-3">
                                    <div class="nk-block-head-content">
                                        <div class="align-center flex-wrap pb-2 gx-4 gy-3">
                                            <div>
                                                <h2 class="nk-block-title fw-normal">POS Module</h2>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="row g-gs">
                                    <div class="col-6">
                                        <input class="form-control" type="text" id="Product_Search" onkeyup="FilterFunction()" placeholder="Search Products">
                                    </div>
                                </div>
                                <div class="row g-gs">
                                    <div class="col-6">
                                        <div class="card  border border-success">
                                            <div class="card-body">
                                                <div class="row g-gs" style="overflow: auto; height: 500px;">
                                                    <?php
                                                    $store = $_GET['store'];
                                                    $product_array = $db_handle->runQuery("SELECT * FROM products p 
                                                    JOIN receipt_customization rc ON p.product_store_id = rc.receipt_store_id
                                                    WHERE p.product_status ='active' AND p.product_store_id = '{$store}'
                                                    ORDER BY p.product_name ASC");
                                                    if (!empty($product_array)) {
                                                        foreach ($product_array as $key => $value) {
                                                            if ($product_array[$key]['allow_discounts'] == 'true') {
                                                    ?>
                                                                <div class="col-12 Product_Name">
                                                                    <form method="post" class="form-inline my-2 my-lg-0" action="pos?store=<?php echo $store; ?>&action=add&product_id=<?php echo $product_array[$key]["product_id"]; ?>">
                                                                        <div class="card border border-primary text-dark">
                                                                            <div class="card-body">
                                                                                <h5 id="product_details" class="card-title">
                                                                                    <?php echo $product_array[$key]["product_name"]; ?>
                                                                                </h5>
                                                                                <!-- Notify User If Product Has Reached Restock Limit -->
                                                                                <?php if ($product_array[$key]["product_quantity"] <= 0) { ?>
                                                                                    <p class="card-text text-danger">
                                                                                        Kindly Restock This Product, Current Qty is <?php echo $product_array[$key]["product_quantity"]; ?>.
                                                                                    </p>
                                                                                <?php } else if ($product_array[$key]["product_quantity"] <= $product_array[$key]["product_quantity_limit"]) { ?>
                                                                                    <p class="card-text text-danger">
                                                                                        Kindly Restock This Product, Current Qty is <?php echo $product_array[$key]["product_quantity"]; ?>.
                                                                                    </p>
                                                                                    <p class="card-text">
                                                                                        <b> <?php echo "Ksh " . $product_array[$key]["product_sale_price"]; ?></b>
                                                                                    </p>
                                                                                    <input type="text" class="form-control mr-sm-2" name="quantity" value="1" size="2" />
                                                                                    <input type="text" class="form-control mr-sm-4" name="Discount" placeholder="Discount" size="8" />
                                                                                    <input type="submit" value="Add" class="btn btn-outline-success my-2 my-sm-0" />
                                                                                <?php } else { ?>
                                                                                    <p class="card-text text-success">
                                                                                        Current Item Quantity is <?php echo $product_array[$key]["product_quantity"]; ?>.
                                                                                    </p>
                                                                                    <p class="card-text">
                                                                                        <b><?php echo "Ksh " . $product_array[$key]["product_sale_price"]; ?></b>
                                                                                    </p>
                                                                                    <input type="text" class="form-control mr-sm-2" name="quantity" value="1" size="2" />
                                                                                    <?php if ($product_array[$key]['allow_discounts'] == 'true') { ?>
                                                                                        <input type="text" class="form-control mr-sm-4" name="Discount" placeholder="Discount" size="8" />
                                                                                    <?php } ?>
                                                                                    <input type="submit" value="Add" class="btn btn-outline-success my-2 my-sm-0" />
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="col-6 Product_Name">
                                                                    <form method="post" class="form-inline my-2 my-lg-0" action="pos?store=<?php echo $store; ?>&action=add&product_id=<?php echo $product_array[$key]["product_id"]; ?>">
                                                                        <div class="card border border-primary text-dark">
                                                                            <div class="card-body">
                                                                                <h5 id="product_details" class="card-title">
                                                                                    <?php echo  $product_array[$key]["product_name"]; ?>
                                                                                </h5>
                                                                                <!-- Notify User If Product Has Reached Restock Limit -->
                                                                                <?php if ($product_array[$key]["product_quantity"] <= 0) { ?>
                                                                                    <p class="card-text text-danger">
                                                                                        Kindly Restock This Product, Current Qty is <?php echo $product_array[$key]["product_quantity"]; ?>.
                                                                                    </p>
                                                                                <?php } else if ($product_array[$key]["product_quantity"] <= $product_array[$key]["product_quantity_limit"]) { ?>
                                                                                    <p class="card-text text-danger">
                                                                                        Kindly Restock This Product, Current Qty is <?php echo $product_array[$key]["product_quantity"]; ?>.
                                                                                    </p>
                                                                                    <p class="card-text">
                                                                                        <b> <?php echo "Ksh " . $product_array[$key]["product_sale_price"]; ?></b>
                                                                                    </p>
                                                                                    <input type="text" class="form-control mr-sm-2" name="quantity" value="1" size="2" />
                                                                                    <input type="text" class="form-control mr-sm-4" name="Discount" placeholder="Discount" size="8" />
                                                                                    <input type="submit" value="Add" class="btn btn-outline-success my-2 my-sm-0" />
                                                                                <?php } else { ?>
                                                                                    <p class="card-text text-success">
                                                                                        Current Item Quantity is <?php echo $product_array[$key]["product_quantity"]; ?>.
                                                                                    </p>
                                                                                    <p class="card-text">
                                                                                        <b><?php echo "Ksh " . $product_array[$key]["product_sale_price"]; ?></b>
                                                                                    </p>
                                                                                    <input type="text" class="form-control mr-sm-2" name="quantity" value="1" size="2" />
                                                                                    <?php if ($product_array[$key]['allow_discounts'] == 'true') { ?>
                                                                                        <input type="text" class="form-control mr-sm-4" name="Discount" placeholder="Discount" size="8" />
                                                                                    <?php } ?>
                                                                                    <input type="submit" value="Add" class="btn btn-outline-success my-2 my-sm-0" />
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card border border-success">
                                            <div class="card-body">
                                                <?php
                                                if (isset($_SESSION["cart_item"])) {
                                                    $total_quantity = 0;
                                                    $total_price = 0;
                                                ?>
                                                    <h5 class="text-center">Items Currently In The Cart</h5>
                                                    <br>
                                                    <form method="POST">
                                                        <div class="text-right">
                                                            <button name="hold_sale" class="btn btn-dim btn-primary btn-sm btn-round" type="submit">
                                                                <em class="icon ni ni-pause-circle"></em>
                                                                Suspend
                                                            </button>
                                                            <a class="btn btn-dim btn-danger btn-sm btn-round" href="pos?store=<?php echo $store; ?>&action=empty">
                                                                <em class="icon ni ni-trash"></em>
                                                                Clear Cart
                                                            </a>
                                                        </div>
                                                    </form>
                                                    <hr>
                                                    <div class="card-block">
                                                        <table class="table" cellpadding="10" cellspacing="1">
                                                            <tbody>
                                                                <tr>
                                                                    <th style="text-align:left;">Item</th>
                                                                    <th style="text-align:right;" width="5%">QTY</th>
                                                                    <th style="text-align:right;" width="10%">Unit Cost</th>
                                                                    <th style="text-align:right;" width="10%">Sub Total</th>
                                                                    <th style="text-align:right;" width="10%">Action</th>
                                                                </tr>
                                                                <?php
                                                                foreach ($_SESSION["cart_item"] as $item) {
                                                                    $item_price = $item["quantity"] * $item["product_sale_price"];
                                                                ?>
                                                                    <tr>
                                                                        <td><?php echo  $item["product_code"] . ' ' . $item["product_name"]; ?></td>
                                                                        <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                                                                        <td style="text-align:right;"><?php echo "Ksh " . number_format($item["product_sale_price"], 2); ?></td>
                                                                        <td style="text-align:right;"><?php echo "Ksh " . number_format($item_price, 2); ?></td>
                                                                        <td style="text-align:right;">
                                                                            <a class="text-right btn btn-dim btn-danger btn-sm btn-round" href="pos?store=<?php echo $store; ?>&action=remove&product_code=<?php echo $item["product_code"]; ?>">
                                                                                <em class="icon ni ni-cross-round"></em> Remove
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                    $total_quantity += $item["quantity"];
                                                                    $total_price += ($item["product_sale_price"] * $item["quantity"]);
                                                                }
                                                                ?>
                                                                <tr>
                                                                    <td colspan="1" align="right"><b>Total:</b></td>
                                                                    <td align="right"><b><?php echo $total_quantity; ?></b></td>
                                                                    <td align="right" colspan="2"><strong><?php echo "Ksh " . number_format($total_price, 2); ?></strong></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <br>
                                                    <?php
                                                    /* Check If Its Allowed To Pick Customer Details */
                                                    $ret = "SELECT * FROM  receipt_customization r
                                                    INNER JOIN payment_settings p ON p.payment_settings_store_id = r.receipt_store_id
                                                    WHERE r.receipt_store_id = '{$store}' ";
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    while ($settings = $res->fetch_object()) {
                                                        if ($settings->show_customer == 'true') {
                                                            /* Show Add Customer Details Module */
                                                    ?>
                                                            <div class="text-right">
                                                                <button type="button" data-toggle="modal" data-target="#checkout_modal" class="btn btn-primary">
                                                                    <em class="icon ni ni-cart-fill"></em>
                                                                    Checkout
                                                                </button>
                                                            </div>
                                                        <?php } else {
                                                            /* Give A Modal To Select Payment Method And Post Transaction Without Asking Customer Details */
                                                        ?>
                                                            <div class="text-right">
                                                                <button type="button" data-toggle="modal" data-target="#checkout_modal_payment_means" class="btn btn-primary">
                                                                    <em class="icon ni ni-cart-fill"></em>
                                                                    Checkout
                                                                </button>
                                                            </div>
                                                        <?php }
                                                        ?>
                                                        <br>
                                                        <!-- Modal To Post Captured Data -->
                                                        <div class="modal fade" id="checkout_modal">
                                                            <div class="modal-dialog  modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Fill All Required Fields</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                            <span>&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post" enctype="multipart/form-data">
                                                                            <input type="hidden" name="total_payable_price" value="<?php echo $total_price; ?>">
                                                                            <div class="form-row">
                                                                                <?php if ($settings->payment_settings_means == 'MPESA') { ?>
                                                                                    <div class="form-group col-md-4">
                                                                                        <label>Customer Name</label>
                                                                                        <input type="text" required name="sale_customer_name" class="form-control">
                                                                                    </div>
                                                                                    <div class="form-group col-md-4">
                                                                                        <label>Phone Number</label>
                                                                                        <input type="text" required name="sale_customer_phoneno" class="form-control">
                                                                                        <!-- Hide This -->
                                                                                        <input type="hidden" name="total_payable_price" value="<?php echo $total_price; ?>">
                                                                                    </div>
                                                                                    <div class="form-group col-md-4">
                                                                                        <label>Payment Means</label>
                                                                                        <select name="sale_payment_method" class="form-select form-control form-control-lg" data-search="on">
                                                                                            <option value="Cash">Cash</option>
                                                                                            <option value="MPESA">Mpesa</option>
                                                                                        </select>
                                                                                    </div>
                                                                                <?php } else if ($settings->payment_settings_means == 'Cedit / Debit Card') { ?>
                                                                                    <div class="form-group col-md-4">
                                                                                        <label>Customer Name</label>
                                                                                        <input type="text" required name="sale_customer_name" class="form-control">
                                                                                    </div>
                                                                                    <div class="form-group col-md-4">
                                                                                        <label>Phone Number</label>
                                                                                        <input type="text" required name="sale_customer_phoneno" class="form-control">
                                                                                        <!-- Hide This -->
                                                                                        <input type="hidden" name="total_payable_price" value="<?php echo $total_price; ?>">
                                                                                    </div>
                                                                                    <div class="form-group col-md-4">
                                                                                        <label>Payment Means</label>
                                                                                        <select name="sale_payment_method" class="form-select form-control form-control-lg" data-search="on">
                                                                                            <option value="Cash">Cash</option>
                                                                                            <option value="Cedit / Debit Card">Cedit / Debit Card</option>
                                                                                        </select>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="form-group col-md-4">
                                                                                        <label>Customer Name</label>
                                                                                        <input type="text" required name="sale_customer_name" class="form-control">
                                                                                    </div>
                                                                                    <div class="form-group col-md-4">
                                                                                        <label>Customer Phone Number</label>
                                                                                        <input type="text" required name="sale_customer_phoneno" class="form-control">
                                                                                        <!-- Hide This -->
                                                                                        <input type="hidden" name="total_payable_price" value="<?php echo $total_price; ?>">
                                                                                    </div>
                                                                                    <div class="form-group col-md-4">
                                                                                        <label>Payment Means</label>
                                                                                        <select name="sale_payment_method" class="form-select form-control form-control-lg" data-search="on" id="paymentMethod">
                                                                                            <option value="Cash">Cash</option>
                                                                                            <option value="Mobile Payment">Mobile Payment</option>
                                                                                            <option value="Credit">Credit</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="SaleTXN" style="display: none;">
                                                                                        <label>Transaction Ref</label>
                                                                                        <input type="text" name="sale_transaction_ref" class="form-control">
                                                                                    </div>
                                                                                    <div class="form-group col-md-12" id="SaleExpectedPaymentDate" style="display: none;">
                                                                                        <label>Expected Payment Date</label>
                                                                                        <input type="date" name="sale_credit_expected_date" class="form-control">
                                                                                    </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                            <div class="text-right">
                                                                                <button name="add_sale" class="btn btn-primary" type="submit">
                                                                                    <em class="icon ni ni-list-check"></em> Save
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Modal -->
                                                    <?php }
                                                } else {
                                                    ?>
                                                    <div class="card text-dark">
                                                        <div class="card-inner">
                                                            <p class="text-danger">
                                                                There Are No Items In The Cart
                                                            </p>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .nk-block -->
        </div>
    </div>
    <!-- content @e -->
    <!-- footer @s -->
    <?php require_once('../partials/pos_footer.php'); ?>
    <!-- footer @e -->
    </div>
    <!-- wrap @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <?php require_once('../partials/scripts.php');
    require_once('../partials/filter_js.php');
    ?>
    <script>
        document.getElementById('paymentMethod').addEventListener('change', function() {
            var paymentMethod = this.value;
            var txnField = document.getElementById('SaleTXN');
            var dateField = document.getElementById('SaleExpectedPaymentDate');

            if (paymentMethod === 'Mobile Payment') {
                txnField.style.display = 'block';
                dateField.style.display = 'none';
            } else if (paymentMethod === 'Credit') {
                txnField.style.display = 'none';
                dateField.style.display = 'block';
            } else {
                txnField.style.display = 'none';
                dateField.style.display = 'none';
            }
        });
    </script>
</body>

</html>