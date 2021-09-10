<?php
if (isset($_GET['error'])) {
    echo 'Error: ' . $_GET['error'];
    if (isset($_GET['error_description']))
        echo ' ' . $_GET['error_description'];
    return;
}

if (!isset($_GET['code'])) {
    echo 'No code detection!';
    return;
}

require_once './config.php';

$code = $_GET['code'];

$url = 'https://yoomoney.ru/oauth/token';
$data = [
    'code' => $code,
    'client_id' => $GLOBALS['ClientId'],
    'grant_type' => 'authorization_code',
    'redirect_uri' => 'http://' . $_SERVER['SERVER_NAME'] . '/code.php',
];

$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    ]
];
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) {
    echo 'Request is failed!';
    return;
}

$res = json_decode($result);
if (isset($res->error)) {
    echo 'Request is error: ' . $res->error;
    return;
}

echo 'YOUR ACCESS TOKEN: ' . $res->access_token;