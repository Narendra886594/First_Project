<?php
session_start();
include('sql_canection.php');

if (isset($_POST['btn'])) {
    $search = $_POST['search'];

    $data = $pdo->prepare("SELECT * FROM `project_form` WHERE name LIKE '$search%'");
    $data->execute();
    $details = $data->fetchAll();
}
?>
<?php if (!isset($details)): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Form</title>
    <link rel="stylesheet" href="allcss_folder/search.css">
</head>
<body>
    <div class="search-container">
        <h2>Search Details</h2>
        <form action="" method="post">
            <input type="search" id="search" name="search" placeholder="Enter search term..." required>
            <button type="submit" class="search-btn" name="btn">Search</button>
        </form>
    </div>
<?php endif; ?>
    <?php if (isset($details)): ?>
        <link rel="stylesheet" href="allcss_folder/search_tabal.css">
        <table class="info-table">
            <form action="" method="post">

                <thead>
                    <tr>
                    <th>Full Name</th>
                    <th>Email ID</th>
                    <th>Phone Number</th>
                    <th>Acount option</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($details as $key => $value): ?>
                    <tr>
                        <td><?php echo $value['name'].' '.$value['last_name']; ?></td>
                        <td><?php echo $value['email_id']; ?></td>
                        <td><?php echo $value['mobile_number']; ?></td> 
                        <td> <button id="cread_acount" name="button" value=" <?php echo $_SESSION['search_id'] = $value['id']; ?> ">Cread Acount</button> </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
           </table>
           <?php endif; ?>
            </form>
        </body>
</html>
<?php
if (isset($_POST['button'])) {
    $_SESSION['search_id'] = $_POST['button'];
    header('Location: search_table.php');
}

?>
