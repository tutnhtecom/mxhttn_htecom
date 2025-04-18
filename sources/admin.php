<?php
require_once('assets/includes/helper.php');
require_once('assets/includes/data_general.php');
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'admin';
$wo['decode_android_v']  = $wo['config']['footer_background'];
$wo['decode_android_value']  = $base64_decode;

$wo['decode_android_n_v']  = $wo['config']['footer_background_n'];
$wo['decode_android_n_value']  = $base64_decode;

$wo['decode_ios_v']  = $wo['config']['footer_background_2'];
$wo['decode_ios_value']  = $base64_decode;

$wo['decode_windwos_v']  = $wo['config']['footer_text_color'];
$wo['decode_windwos_value']  = $base64_decode_za;

$wo['title']       = $wo['lang']['admin_area'] . ' | ' . $wo['config']['siteTitle'];
$wo['content']     = Wo_LoadPage('admin/content');