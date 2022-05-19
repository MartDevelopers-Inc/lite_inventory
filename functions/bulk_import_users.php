<?php
/*
 * Created on Tue May 17 2022
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
        $targetPath = '../storage/bulk_uploads/' . 'USERS_BULK_IMPORT_' . time() . '_' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 1; $i <= $sheetCount; $i++) {
            /* Load Mumble Jumble */
            $user_id  = 'STF-' . substr(str_shuffle("1234567890"), 1, 4);

            $user_name = "";
            if (isset($spreadSheetAry[$i][0])) {
                $user_name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }

            $user_email = "";
            if (isset($spreadSheetAry[$i][1])) {
                $user_email = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }

            $user_phoneno = "";
            if (isset($spreadSheetAry[$i][2])) {
                $user_phoneno = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }

            $user_password = "";
            if (isset($spreadSheetAry[$i][3])) {
                $user_password = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
            }

            $user_access_level = "";
            if (isset($spreadSheetAry[$i][4])) {
                $user_access_level = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }
            /* Allocated User Store ID */
            $user_store_id = mysqli_real_escape_string($mysqli, $_POST['user_store_id']);

            /* Activity Logged */
            $log_type = "User Account Management Logs";
            $log_details = "Created $user_name Account";
            /* Hash Password */
            $enc_password = sha1(md5($user_password));

            if (!empty($user_email)) {
                $query = "INSERT INTO users (user_id, user_name, user_email, user_phoneno, user_password, user_access_level, user_store_id) 
                VALUES(?,?,?,?,?,?,?)";
                $paramType = "sssssss";
                $paramArray = array(
                    $user_id,
                    $user_name,
                    $user_email,
                    $user_phoneno,
                    $enc_password,
                    $user_access_level,
                    $user_store_id
                );
                $insertId = $db->insert($query, $paramType, $paramArray);
                /* Log This Operation */
                include('../functions/logs.php');
                /* Invoke Mailer */
                include('../mailers/bulk_mailer.php');
                /* Detect Connectivity And Invoke Mailer */
                switch (connection_status()) {
                    case CONNECTION_NORMAL:
                        if (empty($insertId) && $mail->send()) {
                            $success = "User Data Imported";
                        } else if (CONNECTION_ABORTED && CONNECTION_TIMEOUT && empty($insertId)) {
                            $info = "User Data Imported, But Mailing Failed, Check Your Internet Connectivity Or User Emails";
                        } else {
                            $err = "Failed To Import Users, Please Try Again";
                        }
                        break;
                    default:
                        $info = "User Data Imported Successfully";
                        break;
                }
            }
        }
    } else {
        $info = "Invalid File Type. Upload Excel File.";
    }
}
