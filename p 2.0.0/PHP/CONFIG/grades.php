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
        
            <img src="2.png" alt="">
        </div>
        <div class="dash-content">
            <div class="activity">
                <div class="title">
                <i class="uil uil-list-ui-alt"></i>
                    <span class="text">Grades of students</span>
                </div>
            <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="ddd">First Name</th>
                    <th class="ddd">Last Name</th>
                    <th class="bbb">group</th>
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
                                <td>$row[idGrp]</td>
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
