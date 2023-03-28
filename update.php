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

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM `student` WHERE `id` = $id " ;
    $_result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($_result) > 0) {
        $row = mysqli_fetch_assoc($_result);
    }
    ?>

<!DOCTYPE html>
<html>
<head> 

<link rel="stylesheet" href="style.css">

    </head>
 <body>
 <div class="register">
<link rel="stylesheet" href="style.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
<form  class ="my-class"action="update.php" method="POST">
    <div class="class1">
        <tr>
<td><input type="hidden" name="id" value="<?php echo  $row['id']; ?>"></td>
        </tr>
    </div>
    <div class="class1">
        <tr>
<td>first name: 
<i id ="user"class="fas fa-user"></i> </td>
</td>
<td><input type="text"  id="fname"  name="fname" value="<?php echo  $row['fname']; ?>"pattern="[a-zA-z]+" required /></td><br>
        </tr>
    </div>
    <div class="class1">
        <tr>
<td>last name: 
<i id ="user"class="fas fa-user"></i> </td>
</td>
 <td><input type="text" id="lname" name="lname" value="<?php echo  $row['lname']; ?>"pattern="[a-zA-z]+" required /></td><br>
        </tr>
    </div>
    <div class="class1">
       <tr>
<td>password:
<i id="lock"class="fas fa-lock"></i>
</td>
<td><input type="password" id="pass" name="password" value="<?php echo  $row['password']; ?>"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/></td><br>
       </tr>    
</div>
<div class="class1">
    <tr>
<td>Female:
    
 <i id ="female"class="fas fa-female"></i>
</td>
<td><input type="radio" id="female" name="sex" value="<?php if($row['sex']=='Femal'){echo $row['sex'];}else{echo 'Femal';}; ?>" <?php  if($row['sex']=='Femal'){echo 'checked';} ;?>/></td><br>
<td>Male:
<i id ="male"class="fas fa-male"></i>
</td>
<td><input type="radio" id="male" name="sex" value="<?php if($row['sex']==='Male'){echo $row['sex'];} else{echo 'Male';}; ?>" <?php  if($row['sex']=='Male'){echo 'checked';} ;?>/></td>
</tr></div>
 <input type="submit" name="submit" > are you sure to update the data
</form> 
</div>
</body>
</html>
<?php
 
}
?>
<?php
if(isset($_POST['submit'])){
  
    $id = $_POST['id'];
    $fname = $_POST["fname"];
    $lname = $_POST['lname'];
    $password = hash(algo:"md5",data:$_POST['password'], binary: false);
     $sex = $_POST['sex'];

    $sql = "UPDATE `student` SET `id`='$id',`fname`='$fname',`lname`='$lname',`password`='$password',`sex`='$sex' WHERE `id`='$id'";
    if(mysqli_query($conn, $sql)){
      
    include_once 'selecte1.php';
    echo "data is display";}
    else{
    echo "not updated";
    }

   
}
?>