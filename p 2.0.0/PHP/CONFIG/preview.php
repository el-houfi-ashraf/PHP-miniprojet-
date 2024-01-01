<?php
session_start();
include("../CLASS/connection.php");
include("../CLASS/etudiant.php");
include("../CLASS/groupe.php");
include("../CLASS/matiere.php");
include("../CLASS/note.php"); 

$connection = new Connection();
$connection->selectDatabase("project");
$idEtudiant = isset($_GET['id']) ? $_GET['id'] : null;
$_SESSION["idE"] = $idEtudiant;
$etudiant = Etudiant::getNotesForEtudiant($idEtudiant, $connection->conn);

if (isset($_POST["submit"])) {
    $idNote = $_POST['idNote'];
    $note = $_POST['note'];
    Note::editNote($idNote, $note, $connection->conn);
    $idNote=$note="";
    header("Location: preview.php?id=$idEtudiant");
}

if (isset($_POST["add"])) {
    $idNote = $_POST['idNote'];
    $libelle = $_POST['subjectField'];
    $coef = $_POST['coefficientField'];
    $note = $_POST['noteField'];

    Matiere::insertMatiere($connection->conn, $libelle, $coef);

    $idMatiere = mysqli_insert_id($connection->conn);

    Note::insertNote($connection->conn, $idEtudiant, $idMatiere, $note);
    $idNote=$libelle=$coef=$note="";
    header("Location: preview.php?id=$idEtudiant");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <link rel="stylesheet" href="../../STYLE/style6.css">
</head>

<body>
    <?php include("nav.php"); ?>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>


        </div>
        <div class="dash-content">
            <div class="activity">
                <div class="title">
                    <i class="uil uil-list-ui-alt"></i>
                    <span class="text">List of subjects</span>
                </div>
                <button onclick="openPopup2()" class="btn1"> Add Subject</button>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th class="zzz">Matiere</th>
                            <th class="ddd">Coefficient</th>
                            <th class="zzz">Note</th>
                            <th class="nnn">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($etudiant) {
                            foreach ($etudiant as $row) {
                                echo " <tr>      
                                        <td>{$row['libelle']}</td>
                                        <td>{$row['coef']}</td>
                                        <td>{$row['note']}</td>
                                        <td>
                                            <button onclick='openPopup(\"{$row['idNote']}\", \"{$row['note']}\")'>
                                                <span class=\"circle1\"></span> 
                                                <span class=\"circle2\"></span>
                                                <span class=\"circle3\"></span>
                                                <span class=\"circle4\"></span>
                                                <span class=\"circle5\"></span>
                                                <span>Edit</span>
                                            </button>   
                                            <a class href='delete.php?id={$row['idNote']}'><button>
                                                <span class=\"circle1\"></span>
                                                <span class=\"circle2\"></span>
                                                <span class=\"circle3\"></span>
                                                <span class=\"circle4\"></span>
                                                <span class=\"circle5\"></span>
                                                <span>Delete</span>
                                            </button></a>
                                        </td>
                                    </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <button onclick="downloadAsPDF()" class="buttonDownload">Download</button>        
    </section>

    <div id="editPopup" class="popup">
        <div class="popup-content">
            <span onclick="closePopup()" class="close">&times;</span>
            <form method='post'>
                <input type='hidden' id='idNote' name='idNote' />
                <label for='note'>New note :</label>
                <input type='float' id='note' name='note' />
                <button type='submit' name='submit'>Save</button>
            </form>
        </div>
    </div>

    <div id="addPopup" class="popup">
        <div class="popup-content">
            <span onclick="closePopup()" class="close">&times;</span>
            <form method='post' action='preview.php?id=<?php echo $idEtudiant; ?>'>
                <label for='subjectField'>Subject :</label>
                <input type='text' id='subjectField' name='subjectField' />
                <label for='coefficientField'>Coefficient :</label>
                <input type='float' id='coefficientField' name='coefficientField' />
                <label for='noteField'>Note :</label>
                <input type='float' id='noteField' name='noteField' />
                <button type='submit' name='add'>Save</button>
            </form>
        </div>
    </div>

    <script src="../../JS Folder/script.js"></script>
</body>
</html>
