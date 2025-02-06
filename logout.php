<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="allcss_folder/logout.css">
  <title>Logout Confirmation</title>
</head>
<body>
  <div class="logout-container">
    <h1>Logged Out Successfully</h1>
    <p>You have been logged out of your account. We hope to see you again soon!</p>
    <div>
      <form action="" method="post">
        <button class="logout-btn" name="logout" >Log in again</button>
        <button class="cancel-btn" name="cancel">Go to Home</button>
      </div>
    </form>
  </div>
</body>
</html>
<?php
if(isset($_POST['logout']))
{
 session_start();
 $id = $_SESSION['id'];
 header('Location: loging.php');
 
 include('sql_canection.php');
  $delete_query  =  "DELETE FROM `user_details` WHERE id = $id";
  $stmt = $pdo->prepare($delete_query);
      
  $stmt->execute();
  $data = $stmt->fetchAll();
  
}
if(isset($_POST['cancel']))
{
  header('Location: cread_table.php');
}

?>