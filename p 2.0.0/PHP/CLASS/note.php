<?php

class Note {

    public $idNote;
    public $idEtudiant;
    public $idMatiere;
    public $note;

    public static function insertNote($conn, $idEtudiant, $idMatiere, $note) {
        $query = "INSERT INTO Note (idEtudiant, idMatiere, note) VALUES ('$idEtudiant', '$idMatiere', '$note')";
        $result = mysqli_query($conn, $query);
    }

    public static function deleteNote($tableName, $conn, $id) {
        $sql = "DELETE FROM $tableName WHERE idNote='$id'";
        if (mysqli_query($conn, $sql)) {
            //header("Location:preview.php");
        }
    }

    public static function editNote($idNote, $note, $conn) {
        $sql = "UPDATE Note SET note = '$note' WHERE idNote = '$idNote'";
        if (mysqli_query($conn, $sql)) {
            //header("Location: test1.php");
        } 
    }
}
?>
        
}