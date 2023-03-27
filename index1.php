<?php
$_SERVERs="localhost";
$username="root";
$password="";
$dbname="registration";

$conn = mysqli_connect($_SERVERs,$username,$password,$dbname);

if (!$conn)
{
    die("connection error:". mysqli_connect_error());
}  
?>
<!DOCTYPE html>
<html>
    <head> 

<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">


<title>new web page</title>
    </head>
    <body>
    

<div class="contener">

   <div class="register">
         <h1>Registration</h1> 
    <form class="my-form" action="index1.php" method="POST">
        <div class="form-group">
            <table >
                <tr>
                <td>first name:
     <i id ="user"class="fas fa-user"></i></td>
    <td><input type="text"  id="fname"  name="fname"  pattern="[a-zA-z]+" required/></td><br>
                </tr>
        </div>
        <div class="form_group">
            <tr>
         <td>last name:
     <i id ="user"class="fas fa-user"></i> </td>
         <td><input type="text" id="lname" name="lname" pattern="[a-zA-z]+" required /></td><br>
            </tr>
      </div>
      <div class="form_group">
<tr>
   <td> password:
   <i id="lock"class="fas fa-lock"></i></td>
    <td><input type="password" id="pass" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
     </td>
     </tr>
     
     <br>

</div>
<div class="form_group">
    <tr>
    <td>female:
  <i id ="female"class="fas fa-female"></i></td>
<td><input type="radio" id="female" name="sex" value="Female"/></td>
 </tr> 
    <tr>
    <td>Male:
    <i id="male"class="fas fa-male"></i></td>
<td><input type="radio" id="male" name="sex" value="Male"/></td>
    </tr>
</div>
</div>
</table>

<input type="submit" name="submit" >

</form> 
</div>
<div style="margin-top: 500px;"></div>
<?php


if(isset($_POST['submit'])){
    
//     $sql = "INSERT INTO `student`(`fname`, `lname`, `password`, `sex`) VALUES ('test','test','1234567890','test')";
//     $res = mysqli_query($conn,$sql);
//     if($res){
//     echo "success";
//work hard and harder
// }

    $stm = $conn->prepare("INSERT INTO `student` (`fname`,`lname`,`password`,`sex`) VALUES (?,?,?,?)");
    $stm->bind_param("ssss",$fname,$lname,$password,$sex);
    $fname = $_POST["fname"];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    var_dump($hashed_password);
    $sex = $_POST['sex'];
     $run = $stm->execute();
     /*require_once 'selecte1.php';*/
     header('Location: selecte1.php');
   echo "inserted successfully";
  
}
?>
</body>
</html> 

