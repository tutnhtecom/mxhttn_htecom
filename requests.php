<?php
require_once('assets/init.php');
require_once('assets/includes/data_general.php');
decryptConfigData();
$f = '';
$s = '';
if (isset($_GET['f'])) {
    $f = Wo_Secure($_GET['f'], 0);
}

if (isset($_GET['s'])) {
    $s = Wo_Secure($_GET['s'], 0);
}
$hash_id = '';
if (!empty($_POST['hash_id'])) {
    $hash_id = $_POST['hash_id'];
} else if (!empty($_GET['hash_id'])) {
    $hash_id = $_GET['hash_id'];
} else if (!empty($_GET['hash'])) {
    $hash_id = $_GET['hash'];
} else if (!empty($_POST['hash'])) {
    $hash_id = $_POST['hash'];
}
$data = array();
$allow_array = $request_allow_array;
if ($f == 'certification' && $s == 'download_user_certification' && !empty($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
    $allow_array[] = 'certification';
}
$non_login_array = $request_non_login_array;
if ($wo['config']['membership_system'] == 1) {
    $non_login_array[] = 'pro_register';
    $non_login_array[] = 'get_payment_method';
    $non_login_array[] = 'cashfree';
    $non_login_array[] = 'paystack';
    $non_login_array[] = 'pay_using_wallet';
    $non_login_array[] = 'get_paypal_url';
    $non_login_array[] = 'stripe_payment';
    $non_login_array[] = 'paypro_with_bitcoin';
    $non_login_array[] = '2checkout_pro';

    $non_login_array[] = 'bank_transfer';
    $non_login_array[] = 'stripe';
}
if (!in_array($f, $allow_array)) {
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
            exit("Restrcited Area");
        }
    } else {
        exit("Restrcited Area");
    }
}
if (!in_array($f, $non_login_array)) {
    if ($wo['loggedin'] == false && ($s != 'load_more_posts' && $s != 'filter_posts')) {
        if ($s != 'load-comments') {
            exit("Please login or signup to continue.");
        }
    }
}
if ($wo['loggedin'] && $wo['user']['banned'] == 1 && !in_array($f, $non_login_array)) {
    exit();
}
$files = scandir('xhr');
unset($files[0]);
unset($files[1]);
if ($f != 'admin_setting' && $f != 'admincp') {
    if ($wo["loggedin"] && !empty($wo['user']) && $wo['user']['is_pro'] && !empty($wo["pro_packages"][$wo['user']['pro_type']]) && !empty($wo["pro_packages"][$wo['user']['pro_type']]['max_upload'])) {
        $wo['config']['maxUpload'] = $wo["pro_packages"][$wo['user']['pro_type']]['max_upload'];
    }
}
if (file_exists('xhr/' . $f . '.php') && in_array($f . '.php', $files)) {
    include 'xhr/' . $f . '.php';
} elseif (!empty($_GET['mode_type']) && in_array($_GET['mode_type'], array('linkedin', 'instagram'))) {
    include 'xhr/modes/' . Wo_Secure($_GET['mode_type']) . '.php';
}
mysqli_close($sqlConnect);
unset($wo);
exit();