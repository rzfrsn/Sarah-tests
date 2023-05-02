<?php

// The url for curl request
// IMPORTANT : you should check if the url is valid in your environment
$url = 'http://localhost/Sarah-tests/api.php';

// parameters
$params = array(
    'param1' => 'PHP script',
    'param2' => 'cURL request test'
);

// Generate a signature for the request
$secret_key = '(qRc8{OjigIA%F"i!kbpIZ5lg^0@jF';
$signature = hash_hmac('sha256', json_encode($params), $secret_key);

// Push $signature into params
$params['signature'] = $signature;

// Init cURL session
$curl = curl_init();

// Set cURL options
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Execute request and get the response from the server (localhost/Sarah-tests/api.php)
$response = curl_exec($curl);

// Close cURL session
curl_close($curl);

// Print the response
echo $response;
?>
