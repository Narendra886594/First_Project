<?php
ob_start(); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="allcss_folder/jquery-ui.min.css">
    <link rel="stylesheet" href="allcss_folder/jquery-ui.css">
    <link rel="stylesheet" href="allcss_folder/cread_acound.css">
    <link rel="stylesheet" href="cread_update.css">
    <title>Update Personal Information</title>
</head>
<body>
    <h2>Update Your Information</h2>
    <form action="" method="POST" enctype="multipart/form-data">

    <label for="photo">Add Photo:</label>
    <input type="file" name="photo" id="photo"><br>

    <label for="name">Full Name:</label>
    <input type="text" id="first-name" name="name" required pattern="[A-Za-z ]+" 
    title="Please enter a valid name with only letters and spaces."><br>

    <label>Email Id:</label>
    <input type="email" name="email" required><br>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select><br><br>

    <label>Date of Birth:</label>
    <input type="text" name="dob" id="dob" required><br>

    <label for="height">Height (in cm):</label>
    <input type="number" id="height" name="height" required min="1" step="0.1"><br>

    <label for="weight">Weight (in kg):</label>
    <input type="number" id="weight" name="weight" min="1" step="0.1"><br>

    <label for="bloodgroup">Blood Group:</label>
    <select id="bloodgroup" name="bloodgroup" required>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
    </select><br><br>

    <label>Religion:</label>
    <input type="text" name="religion" required><br>

    <label>Caste:</label>
    <select id="caste" name="caste">
        <option value="General">General</option>
        <option value="OBC">OBC (Other Backward Classes)</option>
        <option value="SC">SC (Scheduled Castes)</option>
        <option value="ST">ST (Scheduled Tribes)</option>
        <option value="Vokkaliga">Vokkaliga</option>
        <option value="Brahmin">Brahmin</option>
        <option value="Kshatriya">Kshatriya</option>
        <option value="Vaishya">Vaishya</option>
        <option value="Dalit">Dalit</option>
        <option value="Jat">Jat</option>
        <option value="Yadav">Yadav</option>
        <option value="Rajput">Rajput</option>
        <option value="Maratha">Maratha</option>
        <option value="Kurmi">Kurmi</option>
        <option value="Patel">Patel</option>
        <option value="MBC">MBC (Most Backward Classes)</option>
        <option value="Reddy">Reddy</option>
        <option value="Lohar">Lohar</option>
        <option value="Muslim">Muslim</option>
        <option value="Christian">Christian</option>
    </select><br>

    <label>Highest Qualification:</label>
    <input type="text" name="education" required><br>

    <label>Occupation:</label>
    <input type="text" name="occupation" required><br>

    <label for="income">Annual Income (in INR):</label>
    <input type="number" id="income" name="income" min="0" step="1000"><br>

    <label>Father's Occupation:</label>
    <input type="text" name="father_occupation" required><br>

    <label>Mother's Occupation:</label>
    <input type="text" name="mother_occupation" required><br>

    <label>Number of Siblings:</label>
    <input type="number" name="siblings" min="1" step="0" required><br>

    <label>Preferred Religion:</label>
    <input type="text" name="preferred_religion" required><br>

    <label for="partner_age">Preferred Age Range:</label>
    <input type="number" id="partner_age" name="partner_age" min="0"><br>

    <label for="partner_height">Preferred Height (in cm):</label>
    <input type="number" id="partner_height" name="partner_height" min="1" step="0.1"><br>

    <label>About Me:</label>
    <textarea name="about_me" required></textarea><br>

    <input type="submit" name="update" value="Update" />

    </form>
    </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="jquery-ui.min.js"></script>

<script>
$(document).ready(function(){
    $('#dob').datepicker({
       dateFormat : "dd-mm-yy",
       changeMonth: true,
       changeYear: true
    });
});
</script>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      echo "<h3>Form Data Received:</h3>";

      $id = $_SESSION['id'];
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
  }


    $photo = $_FILES['photo']['name'];

    if ($photo) {
        $_SESSION['photo'] = $photo;
        move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/' . $photo);
    }

    include('sql_canection.php');
    $sql = "UPDATE `user_details` 
    SET `name` = '$full_name', `email_id` = '$email', `gender` = '$gender', `birth_date` = '$dob', 
        `height` = '$height', `weight` = '$weight', `Blood_Group` = '$bloodgroup', `Religion` = '$religion',
        `Caste` = '$caste', `Qualification` = '$education', `Annual_Income` = '$income', `occupation` = '$occupation', 
        `father_occupation` = '$father_occupation', `mother_occupation` = '$mother_occupation', 
        `siblings_count` = '$siblings', `preferred_religion` = '$preferred_religion', 
        `preferred_age_range` = '$partner_age', `preferred_height` = '$partner_height', 
        `about_me` = '$about_me', `photo_path` = '$photo' 
    WHERE `id` = '$id'";

$data = $pdo->exec($sql);



    if ($data) {
        move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/' . $_FILES['photo']['name']);
    }

    header('Location: cread_table.php');
    exit();
    
}
?>