<?php

session_start();
if(isset($_SESSION['email_data']) && isset($_SESSION['pass_data']) && isset($_SESSION['email_data']) != '' && isset($_SESSION['pass_data'])!= '')
{
    echo "<h3>WelCome</h3>";
}
else{
    header("Location:form_login.php");
}
?>

<a href="logout.php">Logout</a>
