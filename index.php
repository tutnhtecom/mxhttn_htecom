<?php
require_once('assets/init.php');
decryptConfigData();
require_once('components/index/index_get_page.php');

// Set header
include("components/index/index_get_header.php");
// Set data wo, page
$data   = get_data_page($wo, $all_langs);
$page   = $data["page"];
$wo     = $data["wo"];

//Điêu hướng router
include('components/index/index_get_router.php');

echo Wo_Loadpage('container');
mysqli_close($sqlConnect);
unset($wo);
?>


