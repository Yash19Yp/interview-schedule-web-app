<!-- it is a small code of php for if user is logging out then it redirects user to the login page -->
<?php
    session_start();
    if(session_destroy()){
        header("location:index.php"); 
    }
?>