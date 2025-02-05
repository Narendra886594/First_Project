<?php
include('sql_canection.php');
session_start();
$id = $_SESSION['id'];
$query = "SELECT * FROM `user_details` WHERE `id` = :id"; 
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch();

if(isset($_POST['update'])){
  header('Location: cread_table.php');
     }
 
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

    <label for="photo">Adit Photo:</label>
    <img src="<?php echo "upload/". $data['photo_path']; ?>" width="100px" alt="img"></td><br>
   <input type="hidden" name="old_img" value="<?php echo $data['photo_path'] ?>"/> 
    <input type="file" name="photo" id="photo">

        <label for="name">Full Name:</label>
        <input type="text" id="first-name" name="name" required pattern="[A-Za-z ]+" 
        value="<?php echo $data['name']; ?>" title="Please enter a valid name with only letters and spaces."><br>

        <label>Email Id:</label>
        <input type="email" name="email_id" value="<?php echo $data['email_id']; ?>" required><br>
       
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male" <?php echo ($data['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo ($data['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
            <option value="Other" <?php echo ($data['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
        </select><br><br>

        <label>Date of Birth:</label>
        <input type="text" name="birth_date" value="<?php echo $data['birth_date']; ?>" id="dob" required><br>

        <label for="height">Height (in cm):</label>
        <input type="number" id="height" name="height" value="<?php echo $data['height']; ?>" required min="1" step="0.1"><br>

        <label for="weight">Weight (in kg):</label>
        <input type="number" id="weight" name="weight" value="<?php echo $data['weight']; ?>" min="1" step="0.1"><br>

        <label for="bloodgroup">Blood Group:</label>
        <select id="bloodgroup" name="bloodgroup" required>
            <option value="A+" <?php echo ($data['Blood_Group'] == 'A+') ? 'selected' : ''; ?>>A+</option>
            <option value="A-" <?php echo ($data['Blood_Group'] == 'A-') ? 'selected' : ''; ?>>A-</option>
            <option value="B+" <?php echo ($data['Blood_Group'] == 'B+') ? 'selected' : ''; ?>>B+</option>
            <option value="B-" <?php echo ($data['Blood_Group'] == 'B-') ? 'selected' : ''; ?>>B-</option>
            <option value="O+" <?php echo ($data['Blood_Group'] == 'O+') ? 'selected' : ''; ?>>O+</option>
            <option value="O-" <?php echo ($data['Blood_Group'] == 'O-') ? 'selected' : ''; ?>>O-</option>
            <option value="AB+" <?php echo ($data['Blood_Group'] == 'AB+') ? 'selected' : ''; ?>>AB+</option>
            <option value="AB-" <?php echo ($data['Blood_Group'] == 'AB-') ? 'selected' : ''; ?>>AB-</option>
        </select><br><br>

        <label>Religion:</label>
        <input type="text" name="Religion" value="<?php echo $data['Religion']; ?>" required><br>

    <label>Caste:</label>
    <select id="caste" name="caste">
    <option value="General" <?php echo ($data['Caste'] == 'General') ? 'selected' : ''; ?> >General</option>
    <option value="OBC" <?php echo ($data['Caste'] == 'OBC') ? 'selected' : ''; ?> >OBC (Other Backward Classes)</option>
    <option value="SC" <?php echo ($data['Caste'] == 'SC') ? 'selected' : ''; ?> >SC (Scheduled Castes)</option>
    <option value="ST" <?php echo ($data['Caste'] == 'ST') ? 'selected' : ''; ?> >ST (Scheduled Tribes)</option>
    <option value="Vokkaliga" <?php echo ($data['Caste'] == 'Vokkaliga') ? 'selected' : ''; ?> >Vokkaliga</option>
    <option value="Brahmin" <?php echo ($data['Caste'] == 'Brahmin') ? 'selected' : ''; ?> >Brahmin</option>
    <option value="Kshatriya" <?php echo ($data['Caste'] == 'Kshatriya') ? 'selected' : ''; ?> >Kshatriya</option>
    <option value="Vaishya" <?php echo ($data['Caste'] == 'Vaishya') ? 'selected' : ''; ?> >Vaishya</option>
    <option value="Dalit" <?php echo ($data['Caste'] == 'Dalit') ? 'selected' : ''; ?> >Dalit</option>
    <option value="Jat" <?php echo ($data['Caste'] == 'Jat') ? 'selected' : ''; ?> >Jat</option>
    <option value="Yadav" <?php echo ($data['Caste'] == 'Yadav') ? 'selected' : ''; ?> >Yadav</option>
    <option value="Rajput" <?php echo ($data['Caste'] == 'Rajput') ? 'selected' : ''; ?> >Rajput</option>
    <option value="Maratha" <?php echo ($data['Caste'] == 'Maratha') ? 'selected' : ''; ?> >Maratha</option>
    <option value="Kurmi" <?php echo ($data['Caste'] == 'Kurmi') ? 'selected' : ''; ?> >Kurmi</option>
    <option value="Patel" <?php echo ($data['Caste'] == 'Patel') ? 'selected' : ''; ?> >Patel</option>
    <option value="MBC" <?php echo ($data['Caste'] == 'MBC') ? 'selected' : ''; ?> >MBC (Most Backward Classes)</option>
    <option value="Reddy" <?php echo ($data['Caste'] == 'Reddy') ? 'selected' : ''; ?> >Reddy</option>
    <option value="Lohar" <?php echo ($data['Caste'] == 'Lohar') ? 'selected' : ''; ?> >Lohar</option>
    <option value="Muslim" <?php echo ($data['Caste'] == 'Muslim') ? 'selected' : ''; ?> >Muslim</option>
    <option value="Christian" <?php echo ($data['Caste'] == 'Christian') ? 'selected' : ''; ?> >Christian</option>
</select>
      
        <label>Highest Qualification:</label>
        <input type="text" name="Qualification" value="<?php echo $data['Qualification']; ?>" required><br>

        <label>Occupation:</label>
        <input type="text" name="occupation" value="<?php echo $data['occupation']; ?>" required><br>

        <label for="income">Annual Income (in INR):</label>
        <input type="number" id="income" name="income" value="<?php echo $data['Annual_Income']; ?>" min="0" step="1000"><br>

        <label>Father's Occupation:</label>
        <input type="text" name="father_occupation" value="<?php echo $data['father_occupation']; ?>" required><br>

        <label>Mother's Occupation:</label>
        <input type="text" name="mother_occupation" value="<?php echo $data['mother_occupation']; ?>" required><br>

        <label>Number of Siblings:</label>
        <input type="number" name="siblings_count" value="<?php echo $data['siblings_count'];  ?>" min="1" step="0"  required><br>

        <label>Preferred Religion:</label>
        <input type="text" name="preferred_religion" value="<?php echo $data['preferred_religion']; ?>" required><br>

        <label for="partner_age">Preferred Age Range:</label>
        <input type="number" id="partner_age" name="partner_age" value="<?php echo $data['preferred_age_range']; ?>" min="0"><br>

        <label for="partner_height">Preferred Height (in cm):</label>
        <input type="number" id="partner_height" name="partner_height" value="<?php echo $data['preferred_height']; ?>" min="1" step="0.1"><br>

        <label>About Me:</label>
        <textarea name="about_me" required><?php echo $data['about_me']; ?></textarea><br>
        
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


if (isset($_POST['update'])) {
    
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $new_photo = $_FILES['photo']['name'];
        $old_photo = $data['photo_path']; 
        if ($new_photo != '') { 
            $photo = $new_photo; 

            if (move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . $new_photo)) {
                if ($old_photo && file_exists('uploads/' . $old_photo)) {
                    unlink('uploads/' . $old_photo);
                }
                echo "<h3>Photo uploaded successfully!</h3>";
            } else {
                echo "<h3>Failed to upload photo</h3>";
            }
        } else {
            $photo = $old_photo;
        }
    } else {
        $photo = $data['photo_path'];
    }

        $name = $_POST['name']; 
        $email = $_POST['email_id']; 
        $gender = $_POST['gender']; 
        $birth_date = $_POST['birth_date']; 
        $height = $_POST['height']; 
        $weight = $_POST['weight']; 
        $bloodgroup = $_POST['bloodgroup']; 
        $religion = $_POST['Religion']; 
        $caste = $_POST['caste']; 
        $Qualification = $_POST['Qualification']; 
        $occupation = $_POST['occupation']; 
        $Annual_Income = $_POST['income']; 
        $father_occupation = $_POST['father_occupation']; 
        $mother_occupation = $_POST['mother_occupation']; 
        $siblings_count = $_POST['siblings_count']; 
        $preferred_religion = $_POST['preferred_religion']; 
        $preferred_age_range = $_POST['partner_age']; 
        $preferred_height = $_POST['partner_height']; 
        $about_me = $_POST['about_me']; 

        $update_query = "UPDATE `user_details` SET 
            `name` = '$name', 
            `email_id` = '$email', 
            `gender` = '$gender', 
            `birth_date` = '$birth_date', 
            `height` = '$height', 
            `weight` = '$weight', 
            `Blood_Group` = '$bloodgroup', 
            `Religion` = '$religion', 
            `Caste` = '$caste', 
            `Qualification` = '$Qualification', 
            `occupation` = '$occupation', 
            `Annual_Income` = '$Annual_Income', 
            `father_occupation` = '$father_occupation', 
            `mother_occupation` = '$mother_occupation', 
            `siblings_count` = '$siblings_count', 
            `preferred_religion` = '$preferred_religion', 
            `preferred_age_range` = '$preferred_age_range', 
            `preferred_height` = '$preferred_height', 
            `about_me` = '$about_me', 
            `photo_path` = '$photo' 
        WHERE `id` = $id";

        $stmt = $pdo->prepare($update_query);
        if ($stmt->execute()) {
            echo "<h3>Information Updated Successfully</h3>";
        } else {
            echo "<h3>Error Updating Information</h3>";
        }
      }

?>
