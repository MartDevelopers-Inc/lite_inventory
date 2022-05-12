<?php
/*
 * Created on Fri Feb 11 2022
 *
 *  Devlan Agency - devlan.co.ke 
 *
 * hello@devlan.co.ke
 *
 *
 * The Devlan End User License Agreement
 *
 * Copyright (c) 2022 Devlan Agency
 *
 * 1. GRANT OF LICENSE
 * Devlan Agency hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 * install and activate this system on two separated computers solely for your personal and non-commercial use,
 * unless you have purchased a commercial license from Devlan Agency. Sharing this Software with other individuals, 
 * or allowing other individuals to view the contents of this Software, is in violation of this license.
 * You may not make the Software available on a network, or in any way provide the Software to multiple users
 * unless you have first purchased at least a multi-user license from Devlan Agency.
 *
 * 2. COPYRIGHT 
 * The Software is owned by Devlan Agency and protected by copyright law and international copyright treaties. 
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
 * DEVLAN AGENCY  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 * DEVLAN AGENCY SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
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
 * 7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN AGENCY  OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 * CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 * USE OF THE SOFTWARE, EVEN IF DEVLAN HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 * IN NO EVENT WILL DEVLAN  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 * TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 */


/* This Helper Handles Cash Payments Processing */
$sale_user_id = $_SESSION['user_id'];
$sale_customer_name = $_POST['sale_customer_name'];
$sale_customer_phoneno  = $_POST['sale_customer_phoneno'];
$sale_receipt_no = $b; /* Receipt Number */
$sale_payment_method = $_POST['sale_payment_method'];
$sale_payment_status  = 'paid';

foreach ($cart_products as $cart_products) {
    /* Loop */
    $sale_product_id = $cart_products['product_id'];
    $sale_quantity = $cart_products['quantity'];
    $product_limit = $cart_products['product_quantity_limit'];
    $log_sold_product = $cart_products['product_code'] . ' ' . $cart_products['product_name'];
    $Discount  = $cart_products['Discount'];
    /* Product Sale Price */
    $product_sale_price = $cart_products['product_sale_price'];

    /* Activity Logged */
    $log_type = "Sold $sale_quantity items of $log_sold_product";
    /* Mailer Variables */
    $product_details = $cart_products['product_code'] . ' ' . $cart_products['product_name'];
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
            $update_sql  = "UPDATE products SET product_quantity =? WHERE product_id  = ?";
            $sale_sql =  "INSERT INTO sales (sale_product_id, sale_user_id, sale_quantity, sale_customer_name, sale_customer_phoneno, sale_receipt_no, sale_payment_method, sale_payment_amount, sale_payment_status, sale_discount)
            VALUES(?,?,?,?,?,?,?,?,?,?)";

            /* Prepare */
            $update_prepare = $mysqli->prepare($update_sql);
            $sale_prepare = $mysqli->prepare($sale_sql);

            /* Bind */
            $update_bind = $update_prepare->bind_param('ss', $new_product_qty, $sale_product_id);
            $sale_bind = $sale_prepare->bind_param(
                'ssssssssss',
                $sale_product_id,
                $sale_user_id,
                $sale_quantity,
                $sale_customer_name,
                $sale_customer_phoneno,
                $sale_receipt_no,
                $sale_payment_method,
                $product_sale_price,
                $sale_payment_status,
                $Discount
            );
            /* Execute */
            $update_prepare->execute();
            $sale_prepare->execute();
            /* Log This Operation */
            require_once('../functions/logs.php');
            /* Alerts If Everything Is Okay */
            if ($update_prepare && $sale_prepare) {
                header('Location: staff_dashboard_receipt?print_receipt=' . $sale_receipt_no . '&msg="Cash Sale Posted"');
            } else {
                $err = "Failed!, Please Empty Cart And Repost Again";
            }
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
