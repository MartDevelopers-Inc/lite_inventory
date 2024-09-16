<?php
/*
 * Created on Thu May 12 2022
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


/* Load System Settings */
$ret = "SELECT * FROM  system_settings";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($settings = $res->fetch_object()) {
?>
    <!DOCTYPE html>
    <html lang="zxx" class="js">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Explore the best in apiculture with Native Beecare . We provide top-notch solutions for beekeeping and more. Discover the excellence of our services." />
        <meta name="keywords" content="Native Beecare , Apiculture, Beekeeping, Beekeeping Solutions, Beekeeping Services" />
        <meta name="author" content="Devlan Solutions LTD" />
    
        <!-- Primary Meta Tags -->
        <title>Native Beecare POS - Apiculture at its best</title>
        <meta name="title" content="Native Beecare  - Apiculture at the best" />
        <meta name="description" content="Explore the best in apiculture with Native Beecare . We provide top-notch solutions for beekeeping and more. Discover the excellence of our services." />
    
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://nativebeecare.co.ke/" />
        <meta property="og:title" content="Native Beecare  - Apiculture at the best" />
        <meta property="og:description" content="Explore the best in apiculture with Native Beecare . We provide top-notch solutions for beekeeping and more. Discover the excellence of our services." />
        <meta property="og:image" content="https://nativebeecare.co.ke/assets/img/logo/favicon.png" />
    
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="https://nativebeecare.co.ke/" />
        <meta property="twitter:title" content="Native Beecare  - Apiculture at the best" />
        <meta property="twitter:description" content="Explore the best in apiculture with Native Beecare . We provide top-notch solutions for beekeeping and more. Discover the excellence of our services." />
        <meta property="twitter:image" content="https://nativebeecare.co.ke/assets/img/logo/favicon.png" />
        <!-- Fav Icon  -->
        <link rel="shortcut icon" href="https://nativebeecare.co.ke/assets/img/logo/favicon.png">
        <!-- Page Title  -->
        <!-- StyleSheets  -->
        <link rel="stylesheet" href="../public/css/dashlite.css?ver=1.4.0">
        <!-- Skin Css -->
        <link id="skin-default" rel="stylesheet" href="../public/css/theme.css?ver=1.4.0">
        <!-- Toastr CSS -->
        <link rel="stylesheet" href="../public/js/libs/toastr/toastr.min.css">
    </head>
    <!-- Load Alerts Via Sessionsgi -->
<?php
    /* Password Reset Alerts */
    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }
} ?>