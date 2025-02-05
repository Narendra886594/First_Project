<?php
ob_start(); 
session_start();
?>


<?php

 if (isset($_SESSION['id'])) {
   $id = $_SESSION['id']; 
 } else {
     echo "ID not set in session."; 
     exit();
 }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? ''; 
    $full_name = $_POST['name'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $height = $_POST['height'] ?? '';
    $weight = $_POST['weight'] ?? '';
    $bloodgroup = $_POST['bloodgroup'] ?? '';
    $religion = $_POST['religion'] ?? '';
    $caste = $_POST['caste'] ?? '';
    $education = $_POST['education'] ?? '';
    $occupation = $_POST['occupation'] ?? '';
    $income = $_POST['income'] ?? '';
    $father_occupation = $_POST['father_occupation'] ?? '';
    $mother_occupation = $_POST['mother_occupation'] ?? '';
    $siblings = $_POST['siblings'] ?? '';
    $preferred_religion = $_POST['preferred_religion'] ?? '';
    $partner_age = $_POST['partner_age'] ?? '';
    $partner_height = $_POST['partner_height'] ?? '';
    $about_me = $_POST['about_me'] ?? '';

    $photo = $_FILES['photo']['name'];

    $_SESSION['photo'] = $photo;
 
    include('sql_canection.php');

    $query = "INSERT INTO `user_details` 
                (`id`, `name`, `email_id`, `gender`, `birth_date`, `height`, `weight`, `Blood_Group`, `Religion`, `Caste`, 
                 `Qualification`, `Annual_Income`, `occupation`, `father_occupation`, `mother_occupation`, `siblings_count`, 
                 `preferred_religion`, `preferred_age_range`, `preferred_height`, `about_me` , `photo_path`) 
                VALUES 
                ('$id', '$full_name', '$email', '$gender', '$dob', '$height', '$weight', '$bloodgroup', '$religion', '$caste', 
                 '$education', '$income', '$occupation', '$father_occupation', '$mother_occupation', '$siblings', 
                 '$preferred_religion', '$partner_age', '$partner_height', '$about_me' , '$photo')";

    $data = $pdo->exec($query);

    if($data){
      move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/' . $_FILES['photo']['name']);
      }

    header('Location: cread_table.php');
    exit();
}
?>
