<?php
function get_data($wo)
{
    $data = array();
    if (empty($wo['title'])) {
        $data['title'] = $wo['config']['siteTitle'];
    }
    $data['url']             = '';
    $actual_link             = "http://$_SERVER[HTTP_HOST]";
    $data['title']           = stripslashes(Wo_Secure($wo['title']));
    $data['page']            = $wo['page'];
    $data['welcome_page']    = 0;
    $data['is_css_file']     = 0;
    $data['css_file_header'] = '';
    $data['welcome_url']     = Wo_SeoLink('index.php?link1=welcome');
    if ($wo['page'] == 'welcome') {
        $data['welcome_page'] = 1;
    }
    if ($wo['page'] == 'timeline' && $wo['loggedin'] == true && $wo['config']['css_upload'] == 1 && !empty($wo['user_profile'])) {
        if (!empty($wo['user_profile']['css_file']) && file_exists($wo['user_profile']['css_file'])) {
            $data['is_css_file']     = 1;
            $data['css_file']        = '<link rel="stylesheet" class="styled-profile" href="' . Wo_GetMedia($wo['user_profile']['css_file']) . '">';
            $data['css_file_header'] = $wo['css_file_header'];
        }
    }
    $data['is_footer'] = 0;
    if (in_array($wo['page'], $wo['footer_pages'])) {
        $data['is_footer'] = 1;
    }
    $url = '';
    if (!empty($_POST['url'])) {
        $url = $_POST['url'];
    }
    $data['redirect'] = 0;
    if ($wo['redirect'] == 1) {
        $data['redirect'] = 1;
    }
    // if (strpos($_SERVER["HTTP_REFERER"], 'messages') !== false) {
    //    $data['redirect'] = 1;
    // }
    $data['url'] = Wo_SeoLink('index.php' . $url);

    if (!empty($wo['page_url'])) {
        $data['url'] = $wo['page_url'];
    }

    return $data;
}
