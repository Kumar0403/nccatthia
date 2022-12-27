<?php
session_start();

include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $email = $_POST['email'];
    $dob = $_POST['password'];

    if(!empty($email) && !empty($dob) && !is_numeric($email))
    {
        //read to database
        $query = "select * from register where eid = '$email' limit 1";

        $result = mysqli_query($con,$query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_date =  mysqli_fetch_assoc($result);
                
                if($user_date['dob'] === $dob)
                {
                    $_SESSION['name'] = $user_date['name'];
                    //redirect to index
                    header("Location: cadet.php");
                    die;
                }
            }
        }
        
        echo '<script>alert("Sorry, User Name and Password is Not Valid. Please, Enter valid User Name and Password.")</script>';   
        
    }
    else
    {
        echo '<script>alert("Please enter some valid information")</script>';
    }
}
?>