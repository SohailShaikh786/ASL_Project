<?php

$email=$_POST['email'];
$password=$_POST['password'];


$conn=new mysqli('localhost','root','','sohail');
if($conn->connect_error){
die('Connection Failed : '.$conn->connect_error);

}else{

    $stmt1 = $conn->prepare("SELECT SRN FROM register WHERE email = ? and passwordd = ?");
    // $stmt2 = $conn->prepare("SELECT SRN FROM register WHERE email = ?");

// Bind the parameter
$stmt1->bind_param("ss", $email,$password);

// Execute the query
$stmt1->execute();

// Bind the result variable
$stmt1->bind_result($srn1);

// Fetch the result
if ($stmt1->fetch()) {
    echo '<script>
     window.location.href="1.html";
     alert("login successful")
     </script>';
} else {
    echo '<script>
     window.location.href="login.html";
     alert("invalid credentials")
     </script>';
}

$stmt1->close();



$conn->close();


}
?>