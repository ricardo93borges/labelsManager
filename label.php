<?php

require 'config.php';

$domain = $config['domain'];
$token = $config['private_token'];

function request($domain, $private_token){
    $query = http_build_query([
        'private_token' => $private_token
    ]);

    $url = $domain.'api/v3/projects?'.$query;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_exec($ch);
    curl_close($ch);
}