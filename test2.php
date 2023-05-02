<?php

// Declare the get_download_size function
function get_download_size($url) {
  // Initialize cURL session
  $curl = curl_init();

  // Set cURL options
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

  // Execute  cURL request
  $response = curl_exec($curl);

  // Get the size of the response body
  $size = curl_getinfo($curl, CURLINFO_CONTENT_LENGTH_DOWNLOAD);

  // Close the cURL session
  curl_close($curl);

  // Return the download size in bytes
  return $size;
}


// Test the function
$url = 'http://localhost/Sarah-tests/fakeData.php';
$size = get_download_size($url);
echo '<b>URL :</b> '.$url.'<br/> <b>Donwload size :</b> '.$size.' bytes';

?>
