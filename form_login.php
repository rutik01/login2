<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$conn = mysqli_connect('localhost','root','root','register_form');
session_start();
if(isset($_SESSION['email_data']) && isset($_SESSION['pass_data']) && isset($_SESSION['email_data']) != '' && isset($_SESSION['pass_data'])!= '')
{
    header("location:demo.php");
}


if (isset($_POST['login']))
{
    $email = $_POST['email'];
    $pass =  $_POST['pass'];
    $sel_query = "SELECT * FROM form_data1 WHERE Email = '$email' AND Password = '$pass' ";
    $result = mysqli_query($conn,$sel_query);
    $count = mysqli_num_rows($result);
    if($count==1)
    {
        $row =  mysqli_fetch_assoc($result);
        echo "<pre>";
        print_r($row);


        $_SESSION['email_data'] = $row['Email'];
        $_SESSION['pass_data'] = $row['Password'];

        header("location:demo.php");
    }
    else if($email == '' && $pass == '')
    {
        echo "Plz Enter Your Email and Password";
    }
    else
    {
        echo "Sorry,Plz Enter Valid Email and Password";
    }
}
?>


<form method="post">
    <table border="1">
        <tr>
            <td>Name:</td>
            <td>
                <input type="email" name="email">
            </td>
        </tr>
        <tr>
            <td>Password:</td>
            <td>
                <input type="password" name="pass">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="login" value="Login">
            </td>
        </tr>
    </table>
</form>
