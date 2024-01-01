<?php 
session_start();
include("../CLASS/connection.php");
include("../CLASS/etudiant.php");
$connection = new Connection();
$connection->selectDatabase("project");
if(isset($_POST["submit"])){
  $firstName = $_POST["studentfname"];
  $lastName = $_POST["studentlname"];
  $email = $_POST["studentmail"];
  $phoneNumber = $_POST["studentphone"];
  $idGrp = $_POST["groupes"];
 
  $etudiant = new Etudiant($firstName ,$lastName,$email,$phoneNumber,$idGrp);
  $etudiant-> insertEtudiant("Etudiant", $connection->conn);  

  $firstName = $lastName = $email = $phoneNumber = $idGrp = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../STYLE/style2.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <?php include("nav.php");?>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
        
            <img src="" alt="">
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-user-plus"></i>
                    <span class="text"> Add students</span>
                </div>
    <div class="container">
      <header>Registration</header>
      <form action="#" class="form"  method="post">
        <div class="input-box">
          <label>First Name</label>
          <input type="text" placeholder="Enter firstname" required name="studentfname" value="<?php if(isset($firstName)) echo $firstName; ?>"/>
        </div>
        <div class="input-box">
          <label>Last Name</label>
          <input type="text" placeholder="Enter lastname" required name="studentlname" value="<?php if(isset($lastName)) echo $lastName; ?>"/>
        </div>
        <div class="input-box">
          <label>Email Address</label>
          <input type="text" placeholder="Enter email address" required name="studentmail" value="<?php if(isset($email)) echo $email; ?>"/>
        </div>
        <div class="column" style="display: flex; justify-content: space-between;">
          <div class="input-box" style="width: 45%;">
            <label>Phone Number</label>
            <input type="number" placeholder="Enter phone number" required name="studentphone"value="<?php if(isset($phoneNumber)) echo $phoneNumber; ?>" />
          </div>
          <div class="input-box address" style="width: 50%;">
            <label>Group</label>
            <div class="select-box">
              <select name="groupes">
                <option hidden>Groupe</option>
                <?php
                  include('groupe.php');
                  $groupes=Groupe::selectAllgroupes('Groupe',$connection->conn);
                  foreach($groupes as $groupe){
                    echo "<option value='$groupe[idGrp]' >$groupe[GrpName]</option>";
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
        <button class="cssbuttons-io-button" name="submit">
              Submit
              <div class="icon">
                <svg
                  height="24"
                  width="24"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path d="M0 0h24v24H0z" fill="none"></path>
                  <path
                    d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                    fill="currentColor"
                  ></path>
                </svg>
              </div>
            </button>
      </form>
    </div>
    </div>
    </div>

</div>
    <script src="../../JS Folder/script.js"></script>
</body>
</html> 
   