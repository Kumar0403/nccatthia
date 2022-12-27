<html>
    <body>
<?php
session_start();

include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $regno = $_POST["regno"];
    $name = $_POST["name"];
    $department = $_POST["department"];
    $dob = $_POST["dob"];
    $f_name = $_POST["f_name"];
    $m_name = $_POST["m_name"];
    $b_group = $_POST["b_group"];
    $address = $_POST["address"];
    $m_no = $_POST["m_no"];
    $eid = $_POST["eid"];
    $query = "insert into register(regno,name,department,dob,f_name,m_name,b_group,address,m_no,eid) values('$regno','$name','$department','$dob','$f_name','$m_name','$b_group','$address','$m_no','$eid')";
    $res = mysqli_query($con,$query);
    if(!$res){
        echo '<script>alert("Insertion failed.")</script>';
    }
    else{
        echo '<script>alert("Thank You for Registration complete")</script>';
        echo '<script>alert("Please Check your Username and password in mail.")</script>';
    }
     //redirect to login
    header("Location: login.html");
        die();
}

?>
</body>
</html>