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

    $Card_Holder = mysqli_real_escape_string($conn, $_POST['card-holder']);
    $CVV = mysqli_real_escape_string($conn, $_POST['cvv']);
    $Card_Number = mysqli_real_escape_string($conn, $_POST['card-number']);
    $Months = mysqli_real_escape_string($conn, $_POST['months']);
    $Years = mysqli_real_escape_string($conn, $_POST['years']);
    

    
$sql=" INSERT INTO payment(Card_Holder,CVV,Card_Number,Months,Years) values('$Card_Holder','$CVV','$Card_Number','$Months','$Years')";

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