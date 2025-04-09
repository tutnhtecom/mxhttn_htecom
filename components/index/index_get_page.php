<?php
function get_data_page($wo, $all_langs){
    $page = '';
    if ($wo['loggedin'] == true && !isset($_GET['link1'])) {
        $page = 'home';
    } elseif (isset($_GET['link1'])) {
        $page = $_GET['link1'];
    }
    if ($wo['config']['maintenance_mode'] == 1) {
        if ($wo['loggedin'] == false) {
            if ($page == 'admincp' || $page == 'admin-cp') {
                $page = 'welcome';
            } else {
                if (empty($_COOKIE['maintenance_access']) || (!empty($_COOKIE['maintenance_access']) && $_COOKIE['maintenance_access'] != 1)) {
                    $page = 'maintenance';
                }
            }
        } else {
            if (Wo_IsAdmin() === false) {
                $page = 'maintenance';
            }
        }
    }
    if (!empty($_GET['m'])) {
        $page = 'welcome';
        setcookie('maintenance_access', '1', time() + 31556926, '/');
    }
    if ($page != 'admincp' && $page != 'admin-cp') {
        if ($wo["loggedin"] && !empty($wo['user']) && $wo['user']['is_pro'] && !empty($wo["pro_packages"][$wo['user']['pro_type']]) && !empty($wo["pro_packages"][$wo['user']['pro_type']]['max_upload'])) {
            $wo['config']['maxUpload'] = $wo["pro_packages"][$wo['user']['pro_type']]['max_upload'];
        }
    }    
    
    $wo['lang_attr'] = 'en';
    $wo['lang_dir'] = 'ltr';
    $wo['lang_og_meta'] = '';

    if (!empty($wo["language"]) && !empty($wo['iso']) && in_array($wo["language"], array_keys($wo['iso'])) && !empty($wo['iso'][$wo["language"]])) {
        $wo['lang_attr'] = $wo['iso'][$wo["language"]]->iso;
        $wo['lang_dir'] = $wo['iso'][$wo["language"]]->direction;
        $wo['language_type'] = $wo['iso'][$wo["language"]]->direction;
    }
    foreach ($all_langs as $key => $value) {
        $iso = '';
        if (!empty($wo['iso'][$value])) {
            $iso = $wo['iso'][$value]->iso;
        }
        $wo['lang_og_meta'] .= '<link rel="alternate" href="'.$wo['config']['site_url'].'?lang='.$value.'" hreflang="'.$iso.'" />';
    }
    
    $data = [
        "wo"    => $wo,
        "page"  => $page
    ];
    return $data;
}
