
<?php
try {
    if (isset($_POST['submit'])) {
        $firstName = $_POST['first-name'];
      $lastName = $_POST['last-name'];
   echo    $pasword = $_POST['password'];
         $email_id = $_POST['email-id'];
       $mobileNumber = $_POST['mobile-number'];

       if (strlen($mobileNumber) === 10  ) {
            include('sql_canection.php');  

            $query = "INSERT INTO `project_form` (`name`, `last_name`, `pasword`, `email_id`, `mobile_number`) 
                      VALUES ('$firstName', '$lastName', '$pasword', '$email_id', '$mobileNumber')";
            
            $stmt = $pdo->prepare($query);
            if ($stmt->execute()) {
                header('Location: loging.php');
                exit;
            }
        } else {
            echo "<script>alert('Mobile number should be 10 digits long and contain only numbers.');</script>";
        }
        
    }
}
     catch (PDOException $e) {
    echo "<script>alert('This email is already registered. Please use a different email.');</script>";
}
?>
