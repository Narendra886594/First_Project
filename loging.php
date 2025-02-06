<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="allcss_folder/login.css">
  <title>Login</title>
</head>
<body>
  <h1>Login to Your Account</h1>

  <!-- Login Form -->
  <form method="POST" action="">
    <div class="input_box">
      <label for="email">Email</label>
      <input type="email" name="email-id" placeholder="Enter your email" required>
    </div>

    <div class="input_box">
      <label for="password">Password</label>
      <input type="password" name="password" placeholder="Enter your password" required>
    </div>

    <button type="submit" name="login">Login</button>
  </form>
</body>
</html>


<?php
 session_start();
 if (isset($_POST['login'])) {
     if (isset($_POST['email-id']) && isset($_POST['password'])) {
         include('sql_canection.php');
         $email = $_POST['email-id'];
         $password = $_POST['password'];
         
         $qury = "SELECT pasword, email_id FROM `project_form` WHERE 1;";
        $stmt = $pdo->prepare($qury);
        $stmt->execute();
        $data = $stmt->fetchAll();
        
        foreach ($data as $value) {
            if ($value['email_id'] == $email && $value['pasword'] == $password) {
                echo "Login successful!";
                
                $qury = "SELECT * FROM `project_form` WHERE email_id LIKE '$email' AND pasword LIKE '$password';";
                $ditials = $pdo->prepare($qury);
                $ditials->execute();
                $data = $ditials->fetchAll();
                $id = $data[0]['id'];
                $_SESSION['password'] = $data[0]['pasword'];
                $_SESSION['email'] = $data[0]['email_id'];
                $_SESSION['id'] = $id;
                
                header('location: login_infomeshan.php');        
            break;
               }
              }
        if (!isset($value) || $value['email_id'] != $email || $value['pasword'] != $password) {
         echo "<script>alert('Invalid email or password...');</script>";
          }
      }
  } 
?> 