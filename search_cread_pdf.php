<?php
try {
    ob_start();

    include('sql_canection.php');
    session_start();

    $id = $_SESSION['search_id'];
    $query = "SELECT * FROM `user_details` WHERE `id` = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetchAll();

    $photo = 'upload/' . $data[0]['photo_path'];
    $phototype = pathinfo($photo, PATHINFO_EXTENSION);

    $name = $data[0]['name'];
    $email = $data[0]['email_id'];
    $gender = $data[0]['gender'];
    $birth_date = $data[0]['birth_date'];
    $height = $data[0]['height'] . ' Cm';
    $weight = $data[0]['weight'] . ' kg';
    $bloodgroup = $data[0]['Blood_Group'];
    $religion = $data[0]['Religion'];
    $caste = $data[0]['Caste'];
    $Qualification = $data[0]['Qualification'];
    $occupation = $data[0]['occupation'];
    $Annual_Income = 'INR ' . number_format($data[0]['Annual_Income'], 2);
    $father_occupation = $data[0]['father_occupation'];
    $mother_occupation = $data[0]['mother_occupation'];
    $siblings = $data[0]['siblings_count'];
    $preferred_religion = $data[0]['preferred_religion'];
    $preferred_age_range = $data[0]['preferred_age_range'];
    $preferred_height = $data[0]['preferred_height'] . ' Cm';
    $about_me = $data[0]['about_me'];

    include_once('fpdf186/fpdf.php');

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("times", "B", 16);
    $pdf->Cell(0, 10, "User Data Report", 1, 1, 'C');
    $pdf->SetFont("times", "", 12);
    $pdf->Cell(45, 10, "Field:", 1, 0, 'C');
    $pdf->Cell(0, 10, 'Details', 1, 1, 'C');

    if (file_exists($photo)) {
        $pdf->Image($photo, 122, 30, 10, 10, strtolower($phototype));
        $pdf->Cell(45, 10, "Photo:", 1, 1, 'C');
    } else {
        $pdf->Cell(45, 10, "Photo:", 1, 0, 'C');
        $pdf->Cell(0, 10, 'No photo available', 1, 1, 'C');
    }

    $pdf->Cell(45, 10, "Name:", 1, 0, 'C');
    $pdf->Cell(0, 10, $name, 1, 1, 'C');

    $pdf->Cell(45, 10, "Email:", 1, 0, 'C');
    $pdf->Cell(0, 10, $email, 1, 1, 'C');

    $pdf->Cell(45, 10, "Gender:", 1, 0, 'C');
    $pdf->Cell(0, 10, $gender, 1, 1, 'C');

    $pdf->Cell(45, 10, "Birth Date:", 1, 0, 'C');
    $pdf->Cell(0, 10, $birth_date, 1, 1, 'C');

    $pdf->Cell(45, 10, "Height:", 1, 0, 'C');
    $pdf->Cell(0, 10, $height, 1, 1, 'C');

    $pdf->Cell(45, 10, "Weight:", 1, 0, 'C');
    $pdf->Cell(0, 10, $weight, 1, 1, 'C');

    $pdf->Cell(45, 10, "Blood Group:", 1, 0, 'C');
    $pdf->Cell(0, 10, $bloodgroup, 1, 1, 'C');

    $pdf->Cell(45, 10, "Religion:", 1, 0, 'C');
    $pdf->Cell(0, 10, $religion, 1, 1, 'C');

    $pdf->Cell(45, 10, "Caste:", 1, 0, 'C');
    $pdf->Cell(0, 10, $caste, 1, 1, 'C');

    $pdf->Cell(45, 10, "Qualification:", 1, 0, 'C');
    $pdf->Cell(0, 10, $Qualification, 1, 1, 'C');

    $pdf->Cell(45, 10, "Occupation:", 1, 0, 'C');
    $pdf->Cell(0, 10, $occupation, 1, 1, 'C');

    $pdf->Cell(45, 10, "Annual Income:", 1, 0, 'C');
    $pdf->Cell(0, 10, $Annual_Income, 1, 1, 'C');

    $pdf->Cell(45, 10, "Father's Occupation:", 1, 0, 'C');
    $pdf->Cell(0, 10, $father_occupation, 1, 1, 'C');

    $pdf->Cell(45, 10, "Mother's Occupation:", 1, 0, 'C');
    $pdf->Cell(0, 10, $mother_occupation, 1, 1, 'C');

    $pdf->Cell(45, 10, "Siblings Count:", 1, 0, 'C');
    $pdf->Cell(0, 10, $siblings, 1, 1, 'C');

    $pdf->Cell(45, 10, "Preferred Religion:", 1, 0, 'C');
    $pdf->Cell(0, 10, $preferred_religion, 1, 1, 'C');

    $pdf->Cell(45, 10, "Preferred Age Range:", 1, 0, 'C');
    $pdf->Cell(0, 10, $preferred_age_range, 1, 1, 'C');

    $pdf->Cell(45, 10, "Preferred Height:", 1, 0, 'C');
    $pdf->Cell(0, 10, $preferred_height, 1, 1, 'C');

    $pdf->Cell(45, 10, "About Me:", 0, 0, 'C');
    $pdf->MultiCell(0, 10, $about_me, 0, 'C');

    $pdf->Output();

   
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
