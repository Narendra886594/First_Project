<?php
session_start();
include('sql_canection.php');
$id = null;
$qury = "SELECT * FROM `user_details` WHERE 1";
$stmt = $pdo->prepare($qury);
$stmt->execute();  
$data = $stmt->fetchAll();

foreach ($data as $key => $value) {
    if (isset($_SESSION['search_id']) && $_SESSION['search_id'] == $value['id']) {
        $id = $value['id'];
        break;
    }
}
if ($id !== null) {
    $qury = "SELECT * FROM `user_details` WHERE id = :id";
    $stmt = $pdo->prepare($qury);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();  
    $data = $stmt->fetch();
    
    if (!$data) {
        echo "No user Ditials1.";
        exit;
    } else {
    }
} else {
    echo " No user Ditials2.";
   exit;
}

if (isset($_POST['download_pdf'])) {
    header('Location: search_cread_pdf.php');
    exit();
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
                <td>Photo</td>
                <td><img src="upload/<?php echo $data['photo_path']; ?>" width="100px" alt="img"></td>
            </tr>
            <tr>
                <td>Full Name</td>
                <td><?php echo $data['name']; ?></td>
            </tr>
            <tr>
                <td>Email Id</td>
                <td><?php echo $data['email_id']; ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo $data['gender']; ?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?php echo $data['birth_date']; ?></td>
            </tr>
            <tr>
                <td>Height</td>
                <td><?php echo $data['height'] . ' Cm'; ?></td>
            </tr>
            <tr>
                <td>Weight</td>
                <td><?php echo $data['weight'] . ' kg'; ?></td>
            </tr>
            <tr>
                <td>Blood Group</td>
                <td><?php echo $data['Blood_Group']; ?></td>
            </tr>
            <tr>
                <td>Religion</td>
                <td><?php echo $data['Religion']; ?></td>
            </tr>
            <tr>
                <td>Caste</td>
                <td><?php echo $data['Caste']; ?></td>
            </tr>
            <tr>
                <td>Highest Qualification</td>
                <td><?php echo $data['Qualification']; ?></td>
            </tr>
            <tr>
                <td>Occupation</td>
                <td><?php echo $data['occupation']; ?></td>
            </tr>
            <tr>
                <td>Annual Income</td>
                <td><?php echo 'Rs ' . number_format($data['Annual_Income']); ?></td>
            </tr>
            <tr>
                <td>Father's Occupation</td>
                <td><?php echo $data['father_occupation']; ?></td>
            </tr>
            <tr>
                <td>Mother's Occupation</td>
                <td><?php echo $data['mother_occupation']; ?></td>
            </tr>
            <tr>
                <td>Number of Siblings</td>
                <td><?php echo $data['siblings_count']; ?></td>
            </tr>
            <tr>
                <td>Preferred Religion</td>
                <td><?php echo $data['preferred_religion']; ?></td>
            </tr>
            <tr>
                <td>Preferred Age Range</td>
                <td><?php echo $data['preferred_age_range']; ?></td>
            </tr>
            <tr>
                <td>Preferred Height</td>
                <td><?php echo $data['preferred_height'] . ' Cm'; ?></td>
            </tr>
            <tr>
                <td>About Me</td>
                <td><?php echo $data['about_me']; ?></td>
            </tr>
        </tbody>
    </table>

    <form action="" method="post">
        <button type="submit" name="download_pdf" class="btn">Download PDF</button>
        <button type="submit" name="search" class="search">Search</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['search'])){
    header('Location: search.php');
exit;
}
?>