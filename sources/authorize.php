<?php
require_once('assets/includes/data_general.php');
if (empty($_GET['app_id'])) {
    $errors = array(
    	'status' => $api_status_errors_400,
        'errors' => array(
            'error_code' => $error_code_1,
            'message' => 'Empty app ID'
        )
    );
    header("Content-type: application/json");
    echo json_encode($errors, JSON_PRETTY_PRINT);
    exit();
}
if (empty($_GET['app_secret'])) {
    $errors = array(
    	'status' => $api_status_errors_400,
        'errors' => array(
            'error_code' => $error_code_2,
            'message' => 'Empty app secret'
        )
    );
    header("Content-type: application/json");
    echo json_encode($errors, JSON_PRETTY_PRINT);
    exit();
}
if (empty($_GET['code'])) {
    $errors = array(
    	'status' => $api_status_errors_400,
        'errors' => array(
            'error_code' => $error_code_3,
            'message' => 'Empty code'
        )
    );
    header("Content-type: application/json");
    echo json_encode($errors, JSON_PRETTY_PRINT);
    exit();
}
if (Wo_VerifyAPIApii($_GET['app_id'], $_GET['app_secret']) === false) {
	$errors = array(
    	'status' => $api_status_errors_400,
        'errors' => array(
            'error_code' => $error_code_4,
            'message' => 'App id not found or secret id is wrong'
        )
    );
    header("Content-type: application/json");
    echo json_encode($errors, JSON_PRETTY_PRINT);
    exit();
}
if (empty($_GET['code'])) {
    $errors = array(
    	'status' => $api_status_errors_400,
        'errors' => array(
            'error_code' => $error_code_5,
            'message' => 'Empty code'
        )
    );
    header("Content-type: application/json");
    echo json_encode($errors, JSON_PRETTY_PRINT);
    exit();
}
$code = Wo_GetCode($_GET['code']);
if (empty($code)) {
	$errors = array(
    	'status' => $api_status_errors_400,
        'errors' => array(
            'error_code' => $error_code_6,
            'message' => 'Code is invalid'
        )
    );
    header("Content-type: application/json");
    echo json_encode($errors, JSON_PRETTY_PRINT);
    exit();
}
if (Wo_AppHasPermission($code['user_id'], $code['app_id']) === false) {
	$errors = array(
    	'status' => $api_status_errors_400,
        'errors' => array(
            'error_code' => $error_code_7,
            'message' => 'No permission givin'
        )
    );
    header("Content-type: application/json");
    echo json_encode($errors, JSON_PRETTY_PRINT);
    exit();
}
$import = Wo_GenrateToken($code['user_id'], $code['app_id']);
$data = array("status" => 200, "access_token" => $import);

$code = Wo_Secure($code['code']);
$query = mysqli_query($sqlConnect, "DELETE FROM " . T_CODES . " WHERE `code` = '$code'");

header("Content-type: application/json");
echo json_encode($data, JSON_PRETTY_PRINT);
exit();
?>