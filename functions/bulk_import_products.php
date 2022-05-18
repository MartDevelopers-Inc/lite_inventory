<?php
/*
 * Created on Tue Feb 08 2022
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

        for ($i = 0; $i <= $sheetCount; $i++) {
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

            /* Activity Logged */
            $log_type = "Add New Item";
            $log_details = "Added  $product_code - $product_name, With A Total Quantity Of  $product_quantity";

            if (!empty($product_id) || !empty($product_name)) {
                $query = "INSERT INTO products (product_id, product_name, product_description, product_purchase_price, product_sale_price, product_quantity, product_quantity_limit, product_code) 
                VALUES(?,?,?,?,?,?,?,?)";
                /* Log This Operation */
                require('../functions/logs.php');
                $paramType = "ssssssss";
                $paramArray = array(
                    $product_id,
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
