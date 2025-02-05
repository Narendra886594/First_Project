
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