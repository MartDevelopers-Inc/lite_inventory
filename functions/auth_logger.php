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


/* Log User Login Activities */
if ($num > 0) {
    /* Load Sessions */
    $_SESSION['user_id'] = $num['user_id'];
    $_SESSION['user_name'] = $num['user_name'];
    $_SESSION['user_access_level'] = $num['user_access_level'];
    $_SESSION['user_store_id'] = $num['user_store_id'];

    /* Log All Successful Logins */
    $log_ip = $_SERVER['REMOTE_ADDR'];
    $log_type = 'Authentication Logs';
    $log_details = "Successfully Logged Into " . $_SESSION['user_access_level'] . " Dashboard";

    if ($num['user_access_level'] == 'Admin') {
        /* Load System Admin Dashboard */
        mysqli_query($mysqli, "INSERT INTO system_logs(log_user_id, log_ip_address, log_type, log_details) VALUES('{$_SESSION['user_id']}','{$log_ip}', '{$log_type}', '{$log_details}')");
        $extra = "home";
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else if ($num['user_access_level'] == 'Manager') {
        /* Load Manager Dashboard */
        mysqli_query($mysqli, "INSERT INTO system_logs(log_user_id, log_ip_address, log_type, log_details) VALUES('{$_SESSION['user_id']}','{$log_ip}', '{$log_type}', '{$log_details}')");
        $extra = "store_dashboard?view=" . $num['user_store_id'];
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else if ($num['user_access_level'] == 'Staff') {
        /* Staff Dashboard */
        mysqli_query($mysqli, "INSERT INTO system_logs(log_user_id, log_ip_address, log_type, log_details) VALUES('{$_SESSION['user_id']}','{$log_ip}', '{$log_type}', '{$log_details}')");
        $extra = "pos?store=" . $num['user_store_id'];
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
} else {
    $err = "Invalid Authentication Credentials. Please Try Again.";
}
