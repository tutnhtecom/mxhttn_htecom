<?php
    // require_once('./helper.php');    
    require_once('assets/includes/helper.php');    
    // MySQL Hostname
    $sql_db_host = env("DB_HOST") ?? 'mysql';
    // MySQL Database User
    $sql_db_user = env("DB_USER") ?? 'root';    
    // MySQL Database Password
    $sql_db_pass = env("DB_PASS") ?? 'password';
    // MySQL Database Name
    $sql_db_name = env("DB_NAME") ?? 'mang_xa_hoi_db';
    // Site URL
    $site_url = env("APP_URL") ?? 'http://localhost:8081';
    
    $auto_redirect = env("AUTO_REDIRECT") ?? true;
    // Purchase code
    $purchase_code = env("PURCHASE_CODE") ?? null;
    
    $siteEncryptKey = env("SITE_ENCRYPTKEY") ?? null;

?>