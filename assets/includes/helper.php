<?php
function loadEnv($file = '.env') {
    if (!file_exists($file)) {
        return;
    }

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; // Bỏ qua comment
        list($key, $value) = explode('=', $line, 2);
        putenv(trim($key) . '=' . trim($value));
        $_ENV[trim($key)] = trim($value);
        $_SERVER[trim($key)] = trim($value);
    }
}
loadEnv();
function env($key) {
    $value = getenv($key);
    return $value !== false ? $value : null;
}

function response_data(){
    
}

function dump_die($data)
{
    echo "<pre>" . json_encode($data, JSON_PRETTY_PRINT) . "</pre>";
    die();
}
function version()
{       
    return '1.5.2';
}