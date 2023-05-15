<?php

function sendCurlRequest(
    string $url,
    array $headers = [],
    array|string|null $data = null
) {
    $curl = curl_init();
    if (!empty($data)) {
        curl_setopt_array($curl, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
        ]);
    }
    curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => $url,
        CURLOPT_COOKIEJAR => 'cookie.txt'
    ]);
    $response = curl_exec($curl);

    curl_close($curl);

    return $response;
}

$headers = [
    'Accept: application/json',
    'Content-type: application/json',
    // 'Authorization: Bearer 9|RpqQHJnBhoDpWDqwJfrkJglDH1A5lGdHlOtBdtoL',
];

$urls = [
    'login' => 'http://127.0.0.1:8000/api/login',
    'register' => 'http://127.0.0.1:8000/api/register',
] ;

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
$urlCalledAction = $urls[$action];

$url2 = 'http://127.0.0.1:8000/api/genders';
$url3 = 'http://127.0.0.1:8000/api/logout';

$data = [
    'name' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS),
    'email' => filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL),
    'password' => filter_input(INPUT_POST, 'password'),
    'confirm_password' => filter_input(INPUT_POST, 'confirm_password'),
    'role_id' => filter_input(INPUT_POST, 'role_id', FILTER_VALIDATE_INT),
];


echo '<pre>' . print_r(sendCurlRequest($urlCalledAction, $headers, $data), true) . '</pre>';
exit();
