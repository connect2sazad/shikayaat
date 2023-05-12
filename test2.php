<!DOCTYPE html>
<html>
<head>
  <title>Error Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url('your-image.jpg');
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
    }

    .error-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      color: #fff;
      text-align: center;
    }

    .error-code {
      font-size: 100px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .error-message {
      font-size: 36px;
      margin-bottom: 30px;
    }

    .error-description {
      font-size: 24px;
      max-width: 600px;
      margin-bottom: 40px;
    }

    .error-button {
      display: inline-block;
      padding: 15px 30px;
      background-color: #fff;
      color: #000;
      font-size: 18px;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease-in-out;
    }

    .error-button:hover {
      background-color: #eaeaea;
    }
  </style>
</head>
<body>
  <div class="error-container">
    <h1 class="error-code">404</h1>
    <h2 class="error-message">Page Not Found</h2>
    <p class="error-description">The page you are looking for does not exist.</p>
    <a class="error-button" href="/">Go back to homepage</a>
  </div>
</body>
</html>
