<?php
/*
 * Created on Sun May 22 2022
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


/* This Helper Handles Cash Payments Processing */
$sale_user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
$sale_customer_name = mysqli_real_escape_string($mysqli, $_POST['sale_customer_name']);
$sale_customer_phoneno  = mysqli_real_escape_string($mysqli, $_POST['sale_customer_phoneno']);
$sale_receipt_no = mysqli_real_escape_string($mysqli, $b);
$sale_payment_method = mysqli_real_escape_string($mysqli, $_POST['sale_payment_method']);
$sale_payment_status  = mysqli_real_escape_string($mysqli, 'paid');
$total = mysqli_real_escape_string($mysqli, $_POST['total_payable_price']);
$loyalty_points_code = mysqli_real_escape_string($mysqli, $a . $b);


/* Persist Items On Cart */
foreach ($cart_products as $cart_products) {
    $sale_product_id = $cart_products['product_id'];
    $sale_quantity = $cart_products['quantity'];
    $product_limit = $cart_products['product_quantity_limit'];
    $log_sold_product = $cart_products['product_code'] . ' ' . $cart_products['product_name'];
    $Discount  = $cart_products['Discount'];
    $product_sale_price = $cart_products['product_sale_price'];

    /* Activity Logged */
    $log_type = "Sales Management Logs";
    $log_details = "Sold $sale_quantity items of $log_sold_product";

    /* Check If Product Count Is Over Given One */
    $sql = "SELECT * FROM  products  WHERE product_id = '$sale_product_id'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $products = mysqli_fetch_assoc($res);
        /* Check If Current Product Quantity Has Reached Limit  $sale_quantity */
        if ($products['product_quantity'] >= $sale_quantity) {

            /* Deduct Product Sale Quantity From Products Table */
            $new_product_qty = $products['product_quantity'] - $sale_quantity;

            /* SQLS To Persist Changes */
            $update_sql  = "UPDATE products SET product_quantity = '{$new_product_qty}' WHERE product_id  = '{$sale_product_id}'";
            $sale_sql =  "INSERT INTO sales (sale_product_id, sale_user_id, sale_quantity, sale_customer_name, sale_customer_phoneno, sale_receipt_no, sale_payment_method, sale_payment_amount, sale_payment_status, sale_discount, sale_transaction_ref, sale_credit_expected_date)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";

            /* Prepare */
            $update_prepare = $mysqli->prepare($update_sql);
            $sale_prepare = $mysqli->prepare($sale_sql);

            /* Bind */
            $sale_bind = $sale_prepare->bind_param(
                'ssssssssssss',
                $sale_product_id,
                $sale_user_id,
                $sale_quantity,
                $sale_customer_name,
                $sale_customer_phoneno,
                $sale_receipt_no,
                $sale_payment_method,
                $product_sale_price,
                $sale_payment_status,
                $Discount,
                $sale_transaction_ref,
                $sale_credit_expected_date
            );
            /* Execute */
            $update_prepare->execute();
            $sale_prepare->execute();
            /* Log This Operation */
            include('../functions/logs.php');
            /* Make Sure This Portion Will Never Be Triggered */
        } else if ($sale_quantity > $products['product_quantity']) {
            /* Error Quantity Sold Is Greeater Than The One In Stock */
            $err = "There Are Only : " . $products['product_quantity'] . " Items Available For " . $products['product_name'];
        } else {
            $info = "Failed!, Kindly Restock That Product,It Has Reached Restock Limit";
        }
    } else {
        $err = "Failed, Kindly Try Again";
    }
}

if (!empty($sale_customer_phoneno)) {
    /* Load Points Awarder Helper Based On Expenditure */
    include('../functions/loyalty_points.php');
    /* Fetch Number Of Loyalty Point This Customer Has */
    $raw_results = mysqli_query(
        $mysqli,
        "SELECT * FROM loyalty_points WHERE loyalty_points_customer_phone_no = '{$sale_customer_phoneno}'"
    );
    if (mysqli_num_rows($raw_results) > 0) {
        while ($results = mysqli_fetch_array($raw_results)) {
            /* Increment Customer Loyalty Points */
            $new_points = ($results['loyalty_points_count'] + $points_awarded);

            /* Persist New Points */
            $sql = "UPDATE loyalty_points SET loyalty_points_count = '{$new_points}' WHERE  loyalty_points_customer_phone_no = '{$sale_customer_phoneno}' ";
            $prepare = $mysqli->prepare($sql);
            $prepare->execute();
        }
    } else {
        /* Enroll That Customer To Loyalty Points And Add Them */
        $sql = "INSERT INTO loyalty_points (loyalty_points_code, loyalty_points_customer_name, loyalty_points_customer_phone_no, loyalty_points_count)
        VALUES('{$loyalty_points_code}','{$sale_customer_name}', '{$sale_customer_phoneno}', '{$points_awarded}')";
        $prepare = $mysqli->prepare($sql);
        $prepare->execute();
    }
}

/* Alerts If Everything Is Okay */
if ($update_prepare && $sale_prepare) {
    $_SESSION['success'] = "Sale Number $sale_receipt_no Is Posted";
    header(
        'Location: pos_receipt?store=' . $store . '&receipt=' . $sale_receipt_no . '&customer=' . $sale_customer_name . '&points=' . $points_awarded . '&phone=' . $sale_customer_phoneno
    );
    exit();
} else {
    $err = "Failed!, Please Empty Cart And Repost Again";
}
