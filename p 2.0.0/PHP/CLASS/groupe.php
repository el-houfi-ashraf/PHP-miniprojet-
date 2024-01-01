<?php

class Groupe{

    public $idGrp;
    public $name;

    public static function selectAllgroupes($tableName,$conn){
        $sql = "SELECT idGrp, GrpName  FROM $tableName ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        $data=[];
        while($row = mysqli_fetch_assoc($result)) {
        
            $data[]=$row;
        }
        return $data;
    }
    }


    public static function selectGrpById($tableName,$conn,$idGrp){
    $sql = "SELECT name FROM $tableName  WHERE id='$idGrp'";
    $result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

$row = mysqli_fetch_assoc($result);

}
return $row;
}
}









?>