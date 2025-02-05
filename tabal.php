<?php
include('sql_canection.php');
$qury = "SELECT * FROM `project_form` WHERE 1";
$stmt = $pdo->prepare($qury);
$stmt->execute();  
$data = $stmt->fetchAll();
?>
<head>
    <link rel="stylesheet" href="allcss_folder/tabal.css">
</head>
<body>

    <form action="" method="post">

        <table>
            <thead>
                <tr>
                    <th>Sr Num</th>
                    <th>id</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Password</th>
                    <th>Email Id</th>
                    <th>Mobile Number</th>
                <th>Actions</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value):?>
                    <?php
                     if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                     }   
                      $login = $value['id'] == $_SESSION['id'] ? 'Login':'';
                      ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $value['id']; ?></td> 
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['last_name']; ?></td>
                        <td><?php echo $value['pasword']; ?></td>
                        <td><?php echo $value['email_id']; ?></td>
                        <td><?php echo $value['mobile_number'];?></td>
                       
                        <td class="action-buttons">
                            <button class="update-btn" name="update<?php
                            echo $value['id'];?>"><?php echo $login; ?></button>
                        </td> 
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>
 </html>
<?php
if(isset($_POST['update'])){
  header('Location:cread_tabal.php');
}
?>