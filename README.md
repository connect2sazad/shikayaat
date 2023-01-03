# shikayaat
This project is used to raise complaints and queries.


shikayaat is a digital complaint box that allows you to file complaints online and get instant feedback from the organisation. It is a web-based application that is designed to be used by people in the organisation to easify the long and hectic complain raising and resolving process by providing a suitable online platform for the complain filing and resolving.

 - Developer

https://demos.themeselection.com/materio-mui-react-nextjs-admin-template-free/account-settings/
https://codeseven.github.io/toastr/demo.html



<?php
  
  // The plain text password to be hashed
  $plaintext_password = "Password@123";
  
  // The hash of the password that
  // can be stored in the database
  $hash = password_hash($plaintext_password, 
          PASSWORD_DEFAULT);
  
  // Print the generated hash
  echo "Generated hash: ".$hash;
?>

<?php
  
  // Plaintext password entered by the user
  $plaintext_password = "Password@123";
  
  // The hashed password retrieved from database
  $hash = 
"$2y$10$8sA2N5Sx/1zMQv2yrTDAaOFlbGWECrrgB68axL.hBb78NhQdyAqWm";
  
  // Verify the hash against the password entered
  $verify = password_verify($plaintext_password, $hash);
  
  // Print the result depending if they match
  if ($verify) {
      echo 'Password Verified!';
  } else {
      echo 'Incorrect Password!';
  }
?>