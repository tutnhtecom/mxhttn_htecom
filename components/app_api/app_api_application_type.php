<?php 
    function get_data_type_application($applications){
        $type         = '';
        if (!empty($_GET['report_errors'])) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
        $application = 'windows_app';
        if (!empty($_GET['application'])) {
            if (in_array($_GET['application'], $applications)) {
                $application = Wo_Secure($_GET['application']);
            }
        }
        if (!empty($_GET['type'])) {
            $type = Wo_Secure($_GET['type']);
        }
        return [
            "type"              => $type,
            "application"     => $application
        ];
    }
?>