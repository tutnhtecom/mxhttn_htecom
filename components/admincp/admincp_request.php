<?php 
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        $value = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        $_GET[$key] = strip_tags($value);
    }
}
if (!empty($_REQUEST)) {
    foreach ($_REQUEST as $key => $value) {
        $value = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        $_REQUEST[$key] = strip_tags($value);
    }
}
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $value = ($key != 'avatar' && $key != 'game') ? preg_replace('/on[^<>=]+=[^<>]*/m', '', $value) : $value;
        $_POST[$key] = strip_tags($value);
    }
}