<?php
$email=$_POST['email'];
$password=$_POST['password'];

$conn=new mysqli('localhost','root','','sohail');
if($conn->connect_error){
die('Connection Failed : '.$conn->connect_error);

}else{

$stmt = $conn->prepare("insert into register(email, password) values(?,?)");

$stmt->bind_param("ss",$email, $password);

$stmt->execute();


echo '<script>
     window.location.href="login.html";
     alert("Done")
     </script>';

$stmt->close();

$conn->close();


}
?>