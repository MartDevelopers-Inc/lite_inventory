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

use Devlan\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["upload"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    /* Where Magic Happens */
    if (in_array($_FILES["file"]["type"], $allowedFileType)) {
        $targetPath = '../storage/bulk_uploads/' . 'PRODUCTS_BULK_IMPORT_' . time() . '_' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 1; $i <= $sheetCount; $i++) {
            /* Load Mumble Jumble */
            $rand_number = substr(str_shuffle("1234567890"), 1, 4);
            $product_id = sha1(md5(mysqli_real_escape_string($conn, $rand_number . time())));

            $product_name = "";
            if (isset($spreadSheetAry[$i][0])) {
                $product_name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }

            $product_description = "";
            if (isset($spreadSheetAry[$i][1])) {
                $product_description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }
            $product_purchase_price = "";
            if (isset($spreadSheetAry[$i][2])) {
                $product_purchase_price = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }
            $product_sale_price = "";
            if (isset($spreadSheetAry[$i][3])) {
                $product_sale_price = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
            }

            $product_quantity = "";
            if (isset($spreadSheetAry[$i][4])) {
                $product_quantity = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }

            $product_quantity_limit = "";
            if (isset($spreadSheetAry[$i][5])) {
                $product_quantity_limit = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
            }
            $product_code = "";
            if (isset($spreadSheetAry[$i][6])) {
                $product_code = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
            }

            $product_store_id = mysqli_real_escape_string($mysqli, $_POST['product_store_id']);

            /* Activity Logged */
            $log_type = "Items Management Logs";
            $log_details = "Added  $product_code - $product_name, With A Total Quantity Of  $product_quantity";

            if (!empty($product_name)) {
                $query = "INSERT INTO products (product_id, product_store_id, product_name, product_description, product_purchase_price, product_sale_price, product_quantity, product_quantity_limit, product_code) 
                VALUES(?,?,?,?,?,?,?,?,?)";
                /* Log This Operation */
                require('../functions/logs.php');
                $paramType = "sssssssss";
                $paramArray = array(
                    $product_id,
                    $product_store_id,
                    $product_name,
                    $product_description,
                    $product_purchase_price,
                    $product_sale_price,
                    $product_quantity,
                    $product_quantity_limit,
                    $product_code
                );

                $insertId = $db->insert($query, $paramType, $paramArray);
                if (!empty($insertId)) {
                    $err = "Error Occured While Importing Data";
                } else {
                    $success = "Products Imported";
                }
            }
        }
    } else {
        $info = "Invalid File Type. Upload Excel File.";
    }
}
