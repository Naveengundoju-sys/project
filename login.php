<?php
$email=$_POST["email"];
$password=$_POST["Password"];
$con=mysqli_connect("localhost","root","","mydb");
if($con->connect_error)
{
    die("Failed to connect");
}
else
{
    $stmt=$con->prepare("select * from student where Username=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows>0)
    {
        $data=$stmt_result->fetch_assoc();
        if($data["Password"] === $password)
        {
            echo "LOGIN SUCCESSFULLY";
        }
        else{
            echo "<h2>Invalid USERNAME or PASSWORD</h2>";
        }
    }
    else{
        echo "<h2>Invalid USERNAME or PASSWORD</h2>";
    }
}
?>