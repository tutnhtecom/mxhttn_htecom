<?php
require_once('assets/init.php');
require_once('assets/includes/data_general.php');
decryptConfigData();
$api_version  = version(); //'1.5.2'

// $applications = [ 'phone','windows_app'];
$applications = $app_api_applications;
require_once('components/app_api/app_api_application_type.php');
// Set data cho type, application
$data_type_application = get_data_type_application($applications);
// Gán giá trị
$type = $data_type_application["type"];
$application = $data_type_application["application"];

include_once('assets/libraries/twilio/vendor/autoload.php');
require_once('./api/' . $application . '/core/functions.php');
require_once('assets/libraries/social-login/config.php');
require_once('assets/libraries/social-login/autoload.php');

if ($application == 'windows_app') {
    $server_key = (!empty($_POST['server_key'])) ? Wo_Secure($_POST['server_key'], 0) : false;
    if (empty($server_key)) {
        $response_data = array(
            'api_status' => $api_status_errors_404,
            'errors' => array(
                'error_id' => '1',
                'error_text' => 'Error: 404 POST (server_key) not specified, Admin Panel > API Settings > Manage API Server Key'
            )
        );
        echo json_encode($response_data, JSON_PRETTY_PRINT);
        exit();
    }
    if ($server_key != $wo['config']['widnows_app_api_key']) {
        $response_data = array(
            'api_status' => $api_status_errors_404,
            'errors' => array(
                'error_id' => '1',
                'error_text' => 'Error: invalid server key'
            )
        );
        echo json_encode($response_data, JSON_PRETTY_PRINT);
        exit();
    }
}

include_once('components/app_api/app_api_router.php');
mysqli_close($sqlConnect);
unset($wo);
?>
