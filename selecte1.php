<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
 <title>Document</title>
</head>
<body>
     <a type="button" class="btn btn-success" href="index1.php" >home</a><br>
     
     <table class="center">
  <thead>
    <tr>
      <th>#</th>
      <th>first name</th>
      <th>Last name</th>
      <th >Password</th>
      <th>Gender</th>
   <th colspan="2">Action</th>
  </tr>
  </thead>
        
        <tbody>
        <?php
$_SERVERs="localhost";
$username="root";
$password="";
$dbname="registration";

$conn =  mysqli_connect($_SERVERs,$username,$password,$dbname);
if (!$conn)
{
    die("connection error:". mysqli_connect_error());
}
$sql = "SELECT * FROM `student`";
$_result = mysqli_query($conn, $sql);

if (mysqli_num_rows($_result) > 0) {
    $i=1;
while($row = mysqli_fetch_assoc($_result)){
//echo "fname:" .$row["fname"]."lname:".$row["lname"]."password:" .$row["password"]."sex:" .$row["sex"]."<br>";
echo "<div>";
echo "<tr>";
echo "<td >". $i ."</td <br>";
echo  "<td >". $row['fname'] . "</td>";
echo  "<td >". $row['lname'] . "</td>";
echo  "<td >". $row['password'] . "</td>";
echo  "<td >". $row['sex'] . "</td>";

echo  "<td ><a  class='button-update'href='update.php?id=".$row['id']."'>update </a>
 </td>";
echo "<td> <a  class ='button-delete' href='delete1.php?id=".$row['id']."'>delete </a> 
</td>";

echo "</tr>";
echo "</div>";
$i++;
}} 
else{
    echo "no result";
}
?>


        </tbody>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
