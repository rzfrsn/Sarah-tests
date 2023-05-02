<?php

// Define the secret key used to sign requests
$secret_key = '(qRc8{OjigIA%F"i!kbpIZ5lg^0@jF';

// Check request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Extract POST parameters
    $param1 = $_POST['param1'];
    $param2 = $_POST['param2'];
    $signature = $_POST['signature'];

    // Check required parameters
    if (isset($param1) && isset($param2) && isset($signature)) {

        $params = array(
            'param1' => $param1,
            'param2' => $param2
        );

        // create the signature with $params and $secret_key
        $computed_signature = hash_hmac('sha256', json_encode($params), $secret_key);

        // Check if the computed signature matches the signature in the request body
        if ($signature === $computed_signature) {

            // return a success response if signature is correct 
            $response = array(
                'status' => 'success',
                'message' => 'Request processed successfully',
                'params' => $params
            );

            echo json_encode($response);
        } else {
            // return an error response if signature is invalid
            $response = array(
                'status' => 'error',
                'message' => 'Invalid signature'
            );

            echo json_encode($response);
        }
    } else {
        // return error response for missing required parameters
        $response = array(
            'status' => 'error',
            'message' => 'Missing required parameters'
        );

        echo json_encode($response);
    }
} else {
    // return an Error if the request method is not a "POST"
    $response = array(
        'status' => 'error',
        'message' => 'Invalid request method'
    );

    echo json_encode($response);
}

?>
