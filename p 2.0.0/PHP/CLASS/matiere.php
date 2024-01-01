<?php

class Matiere {

    public $idMat;
    public $libelle;
    public $coef;

    public static function insertMatiere($conn, $libelle, $coef) {
        $query = "INSERT INTO Matiere (libelle, coef) VALUES ('$libelle', '$coef')";
        $result = mysqli_query($conn, $query);
    }
    

    public static function selectAllMatieres($tableName, $conn) {
        $sql = "SELECT idMat, libelle, coef FROM $tableName";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $data = [];

            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }

            return $data;
        }
        return [];
    }

    public static function selectMatiereById($tableName, $conn, $idMat) {
        $sql = "SELECT libelle, coef FROM $tableName WHERE idMat = '$idMat'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }

        return null;
    }
}
?>










?>