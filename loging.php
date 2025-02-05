
<?php
 http://localhost/project/loging.php

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
                
                header('Location: http://localhost/students_project/login.php');        
            break;
               }
              }
        if (!isset($value) || $value['email_id'] != $email || $value['pasword'] != $password) {
         echo "<script>alert('Invalid email or password...');</script>";
          }
      }
  } 
?> 