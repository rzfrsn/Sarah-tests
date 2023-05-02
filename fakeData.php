<?php 
  // create fake data (an array of strings)
  $array = [];
  $array[] = 'fragg';
  $array[] = 'eddy';
  $array[] = 'jimmy';
  $array[] = 'sarine';
  $array[] = 'corine';
  $array[] = 'farida';
  $array[] = 'smith';

  // pase $array to JSON
  $response = json_encode($array);

  // calc the size of response
  $size = strlen($response);
  
  // put a content-length in header
  // this help cURL to retrieve the response size
  header("Content-length: $size");

  // display the response
  echo $response;
?>