<?php
// Get data header
//------------------------------------------------------------------------------------------------
if (!empty($auto_redirect)) {
    $checkHTTPS = checkHTTPS();
    $isURLSSL = strpos($site_url, 'https');
    if ($isURLSSL !== false) {
        if (empty($checkHTTPS)) {
            header("Location: https://" . full_url($_SERVER));
            exit();
        }
    } else if ($checkHTTPS) {
        header("Location: http://" . full_url($_SERVER));
        exit();
    }
    if (strpos($site_url, 'www') !== false) {
        if (!preg_match('/www/', $_SERVER['HTTP_HOST'])) {
            $protocol = ($isURLSSL !== false) ? "https://" : "http://";
            header("Location: $protocol" . full_url($_SERVER));
            exit();
        }
    }
    if (preg_match('/www/', $_SERVER['HTTP_HOST'])) {
        if (strpos($site_url, 'www') === false) {
            $protocol = ($isURLSSL !== false) ? "https://" : "http://";
            header("Location: $protocol" . str_replace("www.", "", full_url($_SERVER)));
            exit();
        }
    }
}

if ($wo['loggedin'] == true) {
    $update_last_seen = Wo_LastSeen($wo['user']['user_id']);
} else if (!empty($_SERVER['HTTP_HOST'])) {
}
//------------------------------------------------------------------------------------------------
// Get data cho value

if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        if (!is_array($value)) {
            $value      = ($key != 'last_url') ? preg_replace('/on[^<>=]+=[^<>]*/m', '', $value) : $value;
            $value      = preg_replace('/\((.*?)\)/m', '', $value);
            $_GET[$key] = strip_tags($value);
        }
    }
}
if (!empty($_REQUEST)) {    
    foreach ($_REQUEST as $key => $value) {
        if (!is_array($value)) {
            $value          = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
            $_REQUEST[$key] = strip_tags($value);
        }
    }
}
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        if (!is_array($value)) {
            $value       = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
            $_POST[$key] = strip_tags($value);
        }
    }
}
if (!empty($_GET['ref']) && $wo['loggedin'] == false) {
    $_GET['ref'] = Wo_Secure($_GET['ref']);
    $ref_user_id = Wo_UserIdFromUsername($_GET['ref']);
    $user_date   = Wo_UserData($ref_user_id);
    if (!empty($user_date)) {
        $_SESSION['ref'] = $user_date['username'];
    }
}

// Set value
if ($wo['loggedin'] == true) {
    $update_last_seen = Wo_LastSeen($wo['user']['user_id']);
} 
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        if (!is_array($value)) {
            $value      = ($key != 'last_url') ? preg_replace('/on[^<>=]+=[^<>]*/m', '', $value) : $value;
            $value      = preg_replace('/\((.*?)\)/m', '', $value);
            $_GET[$key] = strip_tags($value);
        }
    }
}
if (!empty($_REQUEST)) {    
    foreach ($_REQUEST as $key => $value) {
        if (!is_array($value)) {
            $value          = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
            $_REQUEST[$key] = strip_tags($value);
        }
    }
}
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        if (!is_array($value)) {
            $value       = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
            $_POST[$key] = strip_tags($value);
        }
    }
}
if (!empty($_GET['ref']) && $wo['loggedin'] == false) {
    $_GET['ref'] = Wo_Secure($_GET['ref']);
    $ref_user_id = Wo_UserIdFromUsername($_GET['ref']);
    $user_date   = Wo_UserData($ref_user_id);
    if (!empty($user_date)) {
        $_SESSION['ref'] = $user_date['username'];
    }
}
if (!isset($_COOKIE['src'])) {
    @setcookie('src', '1', time() + 31556926, '/');
}


// thêm mới tiếp heo
if ((!isset($_GET['link1']) && $wo['loggedin'] == false) || (isset($_GET['link1']) && $wo['loggedin'] == false && $page == 'home')) {    
    $landingPage = $wo['config']['directory_landing_page'];
    if($landingPage == 'home') {
        //$page = 'welcome';
    } else  {
        header("Location: " . Wo_SeoLink("index.php?link1=$landingPage"));
        exit();
    }
}