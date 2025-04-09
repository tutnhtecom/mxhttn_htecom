<?php 

if ($wo['loggedin'] == true) {
    $update_last_seen = Wo_LastSeen($wo['user']['user_id']);
}
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        $value      = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        $_GET[$key] = strip_tags($value);
    }
}
if (!empty($_REQUEST)) {
    foreach ($_REQUEST as $key => $value) {
        $value          = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        $_REQUEST[$key] = strip_tags($value);
    }
}
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        if ($key != 'url') {
            $value       = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        }
        $_POST[$key] = strip_tags($value);
    }
}
$page = '';
if ($wo['loggedin'] == true && !isset($_GET['link1'])) {
    $page = 'home';
} elseif (isset($_GET['link1'])) {
    $page = Wo_Secure($_GET['link1'], 0);
}
if ((!isset($_GET['link1']) && $wo['loggedin'] == false) || (isset($_GET['link1']) && $wo['loggedin'] == false && $page == 'home')) {
    $page = 'welcome';
}

$came_from = false;
if ($page == 'timeline') {
    $came_from = true;
}
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        exit("Restrcited Area");
    }
} else {
    exit("Restrcited Area");
}