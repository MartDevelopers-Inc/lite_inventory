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

use Kopokopo\SDK\K2;


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
            $sale_sql =  "INSERT INTO sales (sale_product_id, sale_user_id, sale_quantity, sale_customer_name, sale_customer_phoneno, sale_receipt_no, sale_payment_method, sale_payment_amount, sale_payment_status, sale_discount)
            VALUES(?,?,?,?,?,?,?,?,?,?)";

            /* Prepare */
            $update_prepare = $mysqli->prepare($update_sql);
            $sale_prepare = $mysqli->prepare($sale_sql);

            /* Bind */
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
// Do not hard code these values
$options = [
    'clientId' => 'mtqU9csKRtaKMl6Otvl7Hm97UO8QBvLCGuHZpOJHbKs',
    'clientSecret' => 'B0Co2vhwSnLJobrRVuBhVOrxjyc7Y7P8o3yWKyq_7qk',
    'apiKey' => 'Dd7UsCfagPj8MCUqu_V8H-clbz9_nzPr7gw02t11AMs',
    'baseUrl' => 'https://sandbox.kopokopo.com'
];
$K2 = new K2($options);
$stk = $K2->StkService();

$response = $stk->initiateIncomingPayment([
    'paymentChannel' => 'M-PESA STK Push',
    'tillNumber' => 'K000000',
    'firstName' => 'Jane',
    'lastName' => 'Doe',
    'phoneNumber' => "$sale_customer_phoneno",
    'amount' => $total,
    'currency' => 'KES',
    'email' => 'example@example.com',
    'callbackUrl' => 'https://callback_to_your_app.your_application.com/endpoint',
]);

/* Alerts If Everything Is Okay */
if ($update_prepare && $sale_prepare && $response['status'] == 'success') {
    $_SESSION['success'] = "Sale Number $sale_receipt_no Is Posted";
    header(
        'Location: pos_receipt?store=' . $store . '&receipt=' . $sale_receipt_no . '&customer=' . $sale_customer_name . '&points=' . $points_awarded . '&phone=' . $sale_customer_phoneno
    );
    exit();
} else {
    $err = "Failed!, Please Empty Cart And Repost Again";
}
