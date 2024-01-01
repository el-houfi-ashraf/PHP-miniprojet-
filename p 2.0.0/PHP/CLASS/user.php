<?php 
class Users {
    private $id;
    private $firsName;
    private $email;
    private $password;
    private $regDate;

        public function __construct($firsName, $email, $password) {
            $this->firsName = $firsName;
            $this->email = $email;
            $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

        public function insertUsers($tableName ,$conn){
            $sql = "INSERT INTO $tableName (firsName, email , password) VALUES ('$this->firsName', '$this->email' , '$this->password')";
            mysqli_query($conn, $sql);
    }

        static function updateUser($user,$tableName,$conn,$id){
            $sql = "UPDATE $tableName SET firsName='$user->firsName',email='$user->email',password ='$user->password' WHERE id='$id'";
                if (mysqli_query($conn, $sql)) {
                    //header("Location:tes.php");
            }
    
    
    }

        static function deleteClient($tableName,$conn,$id){               
            $sql = "DELETE FROM $tableName WHERE id='$id'";
            
            if (mysqli_query($conn, $sql)) {
                //header("Location:tes.php");
            }
            
            
        }

        static function selectUserByEmail($tableName,$conn,$email){               
            $sql = "SELECT email , password , firsName FROM $tableName WHERE email = '$email'"; 
            
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                
                }
                return $row;
            
            
        }


}
?>
