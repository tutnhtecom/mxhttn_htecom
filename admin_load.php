<?php
require_once('assets/init.php');
require_once('assets/includes/data_general.php');
cleanConfigData();
$is_admin     = Wo_IsAdmin();
$is_moderoter = Wo_IsModerator();

include('components/admin_load/admin_load_header.php');
include('components/admin_load/admin_load_request.php');

$path  = (!empty($_GET['path'])) ? getPageFromPath($_GET['path']) : null;
$files = scandir('admin-panel/pages');
unset($files[0]);
unset($files[1]);
unset($files[2]);
$page = 'dashboard';
if (!empty($path['page']) && in_array($path['page'], $files) && file_exists('admin-panel/pages/' . $path['page'] . '/content.phtml')) {
    $page = $path['page'];
}
$wo['user']['permission'] = !empty($wo['user']['permission']) ? json_decode($wo['user']['permission'], true) : [];
if (!empty($wo['user']['permission'][$page])) {
  if (!empty($wo['user']['permission']) && $wo['user']['permission'][$page] == 0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
}
$wo['decode_android_v']  = $wo['config']['footer_background'];
$wo['decode_android_value']  = $base64_decode;

$wo['decode_android_n_v']  = $wo['config']['footer_background_n'];
$wo['decode_android_n_value']  = $base64_decode;

$wo['decode_ios_v']  = $wo['config']['footer_background_2'];
$wo['decode_ios_value']  = $base64_decode;

$wo['decode_windwos_v']  = $wo['config']['footer_text_color'];
$wo['decode_windwos_value']  = $base64_decode_za;
$data = array();
$wo['script_root'] = dirname(__FILE__);
$text = Wo_LoadAdminPage($page . '/content');
?>
<input type="hidden" id="json-data" value='<?php
echo htmlspecialchars(json_encode($data));
?>'>
<?php
echo $text;
?>
