<?php 
$wo['all_pages'] = scandir('admin-panel/pages');
unset($wo['all_pages'][0]);
unset($wo['all_pages'][1]);
unset($wo['all_pages'][2]);

$pages = $auto_pages;
$wo['mod_pages'] = $wo_mod_pages;

if (!empty($_GET['page'])) {
    $page = Wo_Secure($_GET['page'], 0);
}
$wo['decode_android_v']  = $wo['config']['footer_background'];
$wo['decode_android_value']  = $base64_decode;

$wo['decode_android_n_v']  = $wo['config']['footer_background_n'];
$wo['decode_android_n_value']  = $base64_decode;

$wo['decode_ios_v']  = $wo['config']['footer_background_2'];
$wo['decode_ios_value']  = $base64_decode;

$wo['decode_windwos_v']  = $wo['config']['footer_text_color'];
$wo['decode_windwos_value']  = $base64_decode_za;
if ($is_moderoter && !empty($wo['user']['permission'])) {
    $wo['user']['permission'] = json_decode($wo['user']['permission'], true);

    if (!in_array($page, array_keys($wo['user']['permission']))) {
        $wo['user']['permission'][$page] = 0;
        $permission = json_encode($wo['user']['permission']);
        $db->where('user_id', $wo['user']['user_id'])->update(T_USERS, array('permission' => $permission));

        cache($wo['user']['id'], 'users', 'delete');
        header("Location: " . Wo_LoadAdminLinkSettings($page));
        exit();
    } else {
        if ($wo['user']['permission'][$page] == 0) {
            foreach ($wo['user']['permission'] as $key => $value) {
                if ($value == 1) {
                    header("Location: " . Wo_LoadAdminLinkSettings($key));
                    exit();
                }
            }
        }
    }
} elseif ($is_moderoter && empty($wo['user']['permission'])) {
    $permission = array();
    if (!empty($wo['all_pages'])) {
        foreach ($wo['all_pages']  as $key => $value) {
            if (in_array($value, $wo['mod_pages'])) {
                $permission[$value] = 1;
            } else {
                $permission[$value] = 0;
            }
        }
    }
    $permission = json_encode($permission);
    $db->where('user_id', $wo['user']['user_id'])->update(T_USERS, array('permission' => $permission));
    cache($wo['user']['id'], 'users', 'delete');
    $wo['user'] = Wo_UserData($wo['user']['user_id']);
}
// if ($is_moderoter == true && $is_admin == false) {
//     if (!in_array($page, $wo['mod_pages'])) {
//         header("Location: " . Wo_SeoLink('index.php?link1=admin-cp'));
//         exit();
//     }
// }
if (in_array($page, $pages)) {
    $page_loaded = Wo_LoadAdminPage("$page/content");
}
if (empty($page_loaded)) {
    header("Location: " . Wo_SeoLink('index.php?link1=admin-cp'));
    exit();
}

$notify_count = $db->where('recipient_id', 0)->where('admin', 1)->where('seen', 0)->getValue(T_NOTIFICATION, 'COUNT(*)');
$notifications = $db->where('recipient_id', 0)->where('admin', 1)->where('seen', 0)->orderBy('id', 'DESC')->get(T_NOTIFICATION);
$old_notifications = $db->where('recipient_id', 0)->where('admin', 1)->where('seen', 0, '!=')->orderBy('id', 'DESC')->get(T_NOTIFICATION, 5);
$mode = 'day';
if (!empty($_COOKIE['mode']) && $_COOKIE['mode'] == 'night') {
    $mode = 'night';
}
?>