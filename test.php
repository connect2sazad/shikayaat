<?php

$url = 'http://127.0.0.1/news_and_events/get-nae/?nc=1'; // URL to send the GET request to

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
curl_setopt($ch, CURLOPT_HTTPGET, true); // Set HTTP method as GET

// Execute cURL request
$response = curl_exec($ch);

// Check if there were any errors
if(curl_error($ch)) {
    echo 'cURL error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Output response
echo $response;


