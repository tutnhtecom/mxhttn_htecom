<?php
if ($wo['config']['maintenance_mode'] == 1) {
    if ($wo['loggedin'] == false) {
        header("Location: " . Wo_SeoLink('index.php?link1=welcome') . $wo['marker'] . 'm=true');
        exit();
    } else {
        if ($is_admin === false) {
            header("Location: " . Wo_SeoLink('index.php?link1=welcome') . $wo['marker'] . 'm=true');
            exit();
        }
    }
}
if ($is_admin == false && $is_moderoter == false) {
    header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
    exit();
}