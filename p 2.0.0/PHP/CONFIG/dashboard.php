<?php 
session_start();
include("../CLASS/connection.php");
include("../CLASS/etudiant.php");
$connection = new Connection();
$connection->selectDatabase("project");
$etudiant = Etudiant::selectAllEtudiants('Etudiant',$connection->conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $etudiantid = $_POST["student_id"];
    $etudiant =Etudiant::selectEtudiantById('Etudiant',$connection->conn,$etudiantid);
}

$totalStudents = count($etudiant);

$sqlTotalGrades = "SELECT COUNT(*) AS total_grades FROM Note";
$resultTotalGrades = mysqli_query($connection->conn, $sqlTotalGrades);
$rowTotalGrades = mysqli_fetch_assoc($resultTotalGrades);
$totalGrades = $rowTotalGrades['total_grades'];

$sqlTotalSubjects = "SELECT COUNT(*) AS total_subjects FROM Matiere";
$resultTotalSubjects = mysqli_query($connection->conn, $sqlTotalSubjects);
$rowTotalSubjects = mysqli_fetch_assoc($resultTotalSubjects);
$totalSubjects = $rowTotalSubjects['total_subjects'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <?php include("nav.php");?>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

    <?php include("search.php");?>
        
            <img src="" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-book-reader"></i>
                        <span class="text">Total students</span>
                        <span class="number"><?php echo $totalStudents; ?></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-graduation-cap"></i>
                        <span class="text">Total grades</span>
                        <span class="number"><?php echo $totalGrades; ?></span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-subject"></i>
                        <span class="text">Total Subjects</span>
                        <span class="number"><?php echo $totalSubjects; ?></span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                <i class="uil uil-list-ui-alt"></i>
                    <span class="text">List of students</span>
                </div>
            <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="ddd">First Name</th>
                    <th class="ddd">Last Name</th>
                    <th class="eee">Email</th>
                    <th class="bbb">group</th>
                    <th class="ccc">Phone number</th>
                    <th class="aaa">Preview</th>
                </tr>
        </thead>
                <tbody>

                    <?php
                    if($etudiant>0){
                        foreach($etudiant as $row) {
                            echo " <tr>
                                <td>$row[id]</td>
                                <td>$row[firstname]</td>
                                <td>$row[lastname]</td>
                                <td>$row[email]</td>
                                <td>$row[idGrp]</td>
                                <td>$row[phoneNumber]</td>
                                <td>
                                <a href=\"preview.php?id={$row['id']}\"><button>
                                    <span class=\"circle1\"></span>
                                    <span class=\"circle2\"></span>
                                    <span class=\"circle3\"></span>
                                    <span class=\"circle4\"></span>
                                    <span class=\"circle5\"></span>
                                    <span class=\"uil uil-eye\"></span>
                                    
                                </button></a></td>
                            </tr>";
                            }
                    }
                    
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <script src="../../JS Folder/script.js"></script>
</body>
</html>
