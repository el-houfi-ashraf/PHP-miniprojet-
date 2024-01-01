<?php 
class Etudiant {
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $phoneNumber;
    public $idGrp;

        public function __construct($firstname, $lastname, $email, $phoneNumber , $idGrp) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->idGrp = $idGrp;
    }

        public function insertEtudiant($tableName ,$conn){
            $sql = "INSERT INTO $tableName (firstname, lastname, email ,phoneNumber , idGrp ) VALUES ('$this->firstname', '$this->lastname', '$this->email' , '$this->phoneNumber' , '$this->idGrp')";
            mysqli_query($conn, $sql);
    }
   
        public static function  selectAllEtudiants($tableName,$conn){

        $sql = "SELECT id, firstname, lastname,email ,phoneNumber , idGrp   FROM $tableName ";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                $data=[];
                while($row = mysqli_fetch_assoc($result)) {
                
                    $data[]=$row;
                }
                return $data;
            }
        
        }

        static function selectEtudiantById($tableName,$conn,$id){

            $sql = "SELECT id,firstname, lastname,email ,phoneNumber ,  idGrp FROM $tableName  WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            $data=[];
            while($row = mysqli_fetch_assoc($result)) {
                
                var_dump($data);
                $data[]=$row;
            }
            return $data;
        }
    
        }

        static function updateEtudiant($etudiant,$tableName,$conn,$id){
            
            $sql = "UPDATE $tableName SET lastname='$etudiant->lastname',firstname='$etudiant->firstname',email='$etudiant->email',phoneNumber= '$etudiant->phoneNumber'  , idGrp= '$etudiant->idGrp' WHERE id='$id'";
                if (mysqli_query($conn, $sql)) {
                   //header("Location:read.php");
                }
        
        }

        static function deleteEtudiant($tableName,$conn,$id){
            
            $sql = "DELETE FROM $tableName WHERE id='$id'";
        
            if (mysqli_query($conn, $sql)) {
                
                header("Location:preview.php");
            }
            }

            public static function selectEtudiantByGrpId($tableName,$conn,$idGrp){
    
                $sql = "SELECT id, firstname, lastname, email , phoneNumber , idGrp FROM $tableName  WHERE idGrp='$idGrp'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $data=[];
                while($row = mysqli_fetch_assoc($result)) {
                
                    $data[]=$row;
                }
                return $data;
            }
        
            }

            public static function getNotesForEtudiant($idEtudiant, $conn) {
                $sql = "SELECT Note.idNote, Matiere.idMat ,Matiere.libelle, Matiere.coef, Note.note
                        FROM Note
                        JOIN Matiere ON Note.idMatiere = Matiere.idMat
                        WHERE Note.idEtudiant = '$idEtudiant'";
                        
                $result = mysqli_query($conn, $sql);
        
                if ($result) {
                    $data = [];
        
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    }
        
                    return $data;
                } else {
                    die("Error executing query: " . mysqli_error($conn));
                }
            }

}
?>