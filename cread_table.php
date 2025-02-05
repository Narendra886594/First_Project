<?php
include('sql_canection.php');
session_start();

$id = $_SESSION['id'];
$query = "SELECT * FROM `user_details` WHERE `id` = :id"; 
$stmt = $pdo->prepare($query);

$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetchAll();
 if(isset($_POST['update'])){
     header('Location:cread_update.php');
   } 
 
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information Table</title>
    <link rel="stylesheet" href="allcss_folder/cread_tabal.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Field</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>photo </td>
                <td> <img src="<?php echo "upload/". $photo = $data[0]['photo_path']; ?>" width="100px" alt="img"></td>
            </tr>
                <td>Full Name</td>
                <td><?php echo $name = $data[0]['name']; ?></td>
            </tr>
            <tr>
                <td>Email Id</td>
                <td><?php echo $email = $data[0]['email_id']; ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo $gender = $data[0]['gender']; ?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?php echo $birth_date = $data[0]['birth_date']; ?></td>
            </tr>
            <tr>
                <td>Height</td>
                <td><?php echo $height = $data[0]['height'] . ' Cm'; ?></td>
            </tr>
            <tr>
                <td>Weight</td>
                <td><?php echo $weight = $data[0]['weight'] . ' kg'; ?></td>
            </tr>
            <tr>
                <td>Blood Group</td>
                <td><?php echo $bloodgroup = $data[0]['Blood_Group']; ?></td>
            </tr>
            <tr>
                <td>Religion</td>
                <td><?php echo $religion = $data[0]['Religion']; ?></td>
            </tr>
            <tr>
                <td>Caste</td>
                <td><?php echo $caste = $data[0]['Caste']; ?></td>
            </tr>
            <tr>
                <td>Highest Qualification</td>
                <td><?php echo $Qualification = $data[0]['Qualification']; ?></td>
            </tr>
            <tr>
                <td>Occupation</td>
                <td><?php echo $occupation = $data[0]['occupation']; ?></td>
            </tr>
            <tr>
                <td>Annual Income</td>
                <td><?php echo $Annual_Income =  'Rs ' .number_format($data[0]['Annual_Income']); ?></td>
            </tr>
            <tr>
                <td>Father's Occupation</td>
                <td><?php echo $father_occupation = $data[0]['father_occupation']; ?></td>
            </tr>
            <tr>
                <td>Mother's Occupation</td>
                <td><?php echo $mother_occupation = $data[0]['mother_occupation']; ?></td>
            </tr>
            <tr>
                <td>Number of Siblings</td>
                <td><?php echo $siblings = $data[0]['siblings_count']; ?></td>
            </tr>
            <tr>
                <td>Preferred Religion</td>
                <td><?php echo $preferred_religion =  $data[0]['preferred_religion']; ?></td>
            </tr>
            <tr>
                <td>Preferred Age Range</td>
                <td><?php echo $preferred_age_range = $data[0]['preferred_age_range']; ?></td>
            </tr>
            <tr>
                <td>Preferred Height</td>
                <td><?php echo $preferred_height = $data[0]['preferred_height'] . ' Cm'; ?></td>
            </tr>
            <tr>
                <td>About Me</td>
                <td><?php echo $about_me = $data[0]['about_me']; ?></td>
            </tr>
        </tbody>
    </table>
    <form action="" method="post">
        <button type="update" name="update" class="update-btn">Update details</button>
        <button type="dounload_pdf" id="generate-pdf" class="btn"  name="dounload_pdf">Download PDF</button>
        <button name="logout">Logout</button>
        <button name="search">Search Data</button>
    </form>
  </body>
</html>
<?php
ob_start();
if(isset($_POST['dounload_pdf'])){
 
    header('Location: cread_pdf.php');
    
}
 if(isset($_POST['logout'])){
   header('Location: logout.php');
 }

 if(isset($_POST['search'])){
    header('Location: search.php');
  }
 
?>