<?php

// $url = 'http://127.0.0.1/news_and_events/get-nae/?nc=1'; // URL to send the GET request to

// // Initialize cURL session
// $ch = curl_init($url);

// // Set cURL options
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
// curl_setopt($ch, CURLOPT_HTTPGET, true); // Set HTTP method as GET

// // Execute cURL request
// $response = curl_exec($ch);

// // Check if there were any errors
// if(curl_error($ch)) {
//     echo 'cURL error: ' . curl_error($ch);
// }

// // Close cURL session
// curl_close($ch);

// // Output response
// echo $response;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    @font-face {
      font-family: 'Strawberry Bubble Gum';
      src: url('./assets/fonts/Strawberrybubblegum-x3y38.ttf');
    }

    html,
    body {
      height: 100%;
      width: 100%;
      padding: 0;
      margin: 0;
      position: relative;
    }

    main {
      height: 100%;
      width: 100%;
      background-color: yellowgreen;
    }

    .loader-overlay {
      height: 100%;
      width: 100%;
      position: absolute;
      top: 0;
      left: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 4;
      overflow-x: hidden;
    }

    .loader-gate {
      width: 50%;
      height: 100%;
      background-color: #7745DB;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      position: relative;
    }
    
    .left-loader{
      animation: gateOpenLeft 2s ease-in-out forwards;
    }
    
    .right-loader {
      background-color: #BEB2B2;
      justify-content: flex-start;
      animation: gateOpenRight 2s ease-in-out forwards;
    }

    .logo-left {
      position: absolute;
      right: -45px;
      z-index: 5;
    }

    .logo-right {
      position: absolute;
      left: -32px;
      top: 198px;
    }

    .shikayaat-name {
      position: absolute;
      bottom: 10%;
      left: 50%;
      transform: translateX(-50%);
      font-family: 'Strawberry Bubble Gum';
      letter-spacing: 3px;
      font-size: 60px;
    }

    @keyframes gateOpenLeft {
      0% {
        transform: translateX(0%);
      }
      50% {
        transform: translateX(-50%);
      }
      100% {
        transform: translateX(-100%);
      }
    }

    @keyframes gateOpenRight {
      0% {
        transform: translateX(0%);
      }
      50% {
        transform: translateX(50%);
      }
      100% {
        transform: translateX(100%);
      }
    }
  </style>
</head>

<body>
  <div class="loader-overlay">
    <div class="loader-gate left-loader">
      <div class="logo-left">
        <img src="./assets/images/logo-left.png">
      </div>
    </div>

    <div class="loader-gate right-loader">
      <div class="logo-right">
        <img src="./assets/images/logo-right.png">
      </div>
    </div>

    <div class="shikayaat-name">
      shikayaat
    </div>
  </div>
  <main>
    asfdafsddf
  </main>

  <script>
    window.addEventListener('load', function () {
      var loaderOverlay = document.querySelector('.loader-overlay');

      loaderOverlay.style.animation = 'fadeOut 1s ease-in-out forwards';

      setTimeout(function () {
        loaderOverlay.style.display = 'none';
      }, 1000);
    });
  </script>
</body>

</html>