<link rel="stylesheet" href="allcss_folder/login_infomeshan.css">
<?php 
session_start();
include('sql_canection.php');
$id = $_SESSION['id'];

$qury = "SELECT * FROM `project_form` WHERE id LIKE $id;";
$login = $pdo->prepare($qury);
$login->execute();
$data = $login->fetchAll(); 
?>
<h1>Welcome To My Website </h1>
<h2>Welcome To <?php echo $data[0]['name'].' '.$data[0]['last_name'] ?></h2>
<?php
if($data){
echo ucwords("name is : ") . $data[0]['name']."<br>".
ucwords("last name is : ") . $data[0]['last_name']."<br>".
ucwords("password is : ") . $data[0]['pasword']."<br>".
ucwords("email is : ") . $data[0]['email_id']."<br>".
ucwords("mobile number is : ") . $data[0]['mobile_number'];
} else{
  echo "Not Data Difain";    
  }
$_SESSION['name']=$data[0]['name'];  
$_SESSION['last_name']=$data[0]['last_name'];  
?> 

<br><br>
<form action="" method="post">
 <button value="<?php echo $id; ?>" name="cread" id="cread">Cread Acound</button> 
 <button name="back" id="back">Back</button> 
</form>
<?php
 if(isset($_POST['back'])){
    header('location: loging.php');
    }     
if(isset($_POST['cread'])){
  header('location: cread_acound.php');
     
    }  
?>

<div class="size">
  <marquee behavior="" direction="">Welcome  To <?php echo  ucwords($data[0]['name']. ' ' .$data[0]['last_name']) ?></marquee>
</div>