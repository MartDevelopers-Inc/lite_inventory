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
        <title>Nyuki Apiculture Solutions LTD POS - Apiculture at its best</title>
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