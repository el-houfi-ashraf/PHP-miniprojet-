<?php 
session_start();
include("../CLASS/connection.php");
include("../CLASS/etudiant.php");
include("../CLASS/groupe.php");
$connection = new Connection();
$connection->selectDatabase("project");
$etudiant = Etudiant::selectAllEtudiants('Etudiant',$connection->conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../STYLE/style.css">
    <link rel="stylesheet" href="../../STYLE/style3.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <?php include("nav.php");?>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        
            <img src="" alt="">
        </div>

        <div class="dash-content">
        <div class="activity">
                <div class="title">
                    <i class="uil uil-list-ul"></i>
                    <span class="text">List of students by groups</span>
                </div>
                <a href="addstudent.php"><button class="btn"> Add student</button></a>   
        </div>        
        <?php /*
                        foreach ($groupes as $groupe) {
                            echo '
                            <a href="test1.php?idGrp=' . $groupe['idGrp'] . '" class="ag-courses-item_link">
                                <div class="ag-courses-item_bg"></div>
                                <div class="ag-courses-item_title">
                                    ' . $groupe['idGrp'] . '
                                </div>
                                <div class="ag-courses-item_date-box">
                                    Start:
                                    <span class="ag-courses-item_date">
                                        04.11.2022
                                    </span>
                                </div>
                            </a>';
                        }*/
         ?>
        <div class="ag-format-container">
             <div class="ag-courses_box">
            <div class="ag-courses_item">
                <a href="test1.php?idGrp=G1" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                    Groupe 1
                    </div>

                    <div class="ag-courses-item_date-box">
                    Start:
                    <span class="ag-courses-item_date">
                        04.11.2022
                    </span>
                    </div>
                </a>
                </div>

                <div class="ag-courses_item">
                <a href="test1.php?idGrp=G2" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                    Groupe 2
                    </div>

                    <div class="ag-courses-item_date-box">
                    Start:
                    <span class="ag-courses-item_date">
                        04.11.2022
                    </span>
                    </div>
                </a>
                </div>

                <div class="ag-courses_item">
                <a href="test1.php?idGrp=G3" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                    Groupe 3
                    </div>

                    <div class="ag-courses-item_date-box">
                    Start:
                    <span class="ag-courses-item_date">
                        04.11.2022
                    </span>
                    </div>
                </a>
                </div>

                <div class="ag-courses_item">
                <a href="test1.php?idGrp=G4" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                    Groupe 4
                    </div>

                    <div class="ag-courses-item_date-box">
                    Start:
                    <span class="ag-courses-item_date">
                        04.11.2022
                    </span>
                    </div>
                </a>
                </div>

                <div class="ag-courses_item">
                <a href="test1.php?idGrp=G5" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                    Groupe 5
                    </div>

                    <div class="ag-courses-item_date-box">
                    Start:
                    <span class="ag-courses-item_date">
                        04.11.2022
                    </span>
                    </div>
                </a>
                </div>

                <div class="ag-courses_item">
                <a href="test1.php?idGrp=G6" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                    Groupe 6
                    </div>

                    <div class="ag-courses-item_date-box">
                    Start:
                    <span class="ag-courses-item_date">
                        04.11.2022
                    </span>
                    </div>
                </a>
                </div>
            </div>
       </div>
    </div>
    </section>
    <script src="../../JS Folder/script.js"></script>
</body>
</html>
