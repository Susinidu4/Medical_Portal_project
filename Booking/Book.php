<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "medidb";

//Create connection
$conn = new mysqli($servername, $username, $password, $database);

//Check connection
if(!$conn)
{
    die("Connection failed : " .mysqli_connect_error());
}

    $name=mysqli_real_escape_string($conn, $_POST['name']);
    $NIC=mysqli_real_escape_string($conn, $_POST['NIC']);
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $phone=mysqli_real_escape_string($conn, $_POST['phone']);
    $Doctor_Specialization=mysqli_real_escape_string($conn, $_POST['Doctor_Specialization']);
    $Doctor_Name=mysqli_real_escape_string($conn, $_POST['Doctor_Name']);
    $Place=mysqli_real_escape_string($conn, $_POST['Place']);
    $date=mysqli_real_escape_string($conn, $_POST['date']);

    /*echo "$name","$NIC","$email","$phone","$Doctor_Specialization","$Doctor_Name","$Place","$date";*/
$sql=" INSERT INTO patient(Name,NIC,Email,phone,Doctor_Specialization,Doctor_Name,Place,Date) values('$name','$NIC','$email','$phone','$Doctor_Specialization','$Doctor_Name','$Place','$date')";

if($conn->query($sql) === TRUE)
{
    echo"Detail added";
}
else
{
    echo "Error : " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>