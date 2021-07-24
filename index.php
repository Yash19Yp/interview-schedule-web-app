<?php
    // php session for connecting with phpmyadmin data base
    session_start();
    $conn = new mysqli("localhost","root","","task1");

    $msg="";
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = sha1($password);
        $userType = $_POST['userType'];
        
        // below query match the login data with data base 
        $sql = "SELECT * FROM users WHERE username=? AND password=? AND user_type=? ";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("sss",$username,$password,$userType);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        session_regenerate_id();
        $_SESSION['username']=$row['username'];
        $_SESSION['role'] = $row['user_type'];
        session_write_close();

        // below condtions is for checking whether it is student or a recruiter
        // if both the data not match with each other then its displays username or password incorrect
        if($result->num_rows==1 && $_SESSION['role']=="student"){
            header("location:student.php");
        }
        elseif($result->num_rows==1 && $_SESSION['role']=="recruiter"){
            header("location:recruiter.php");
        }
        else{
            $msg= "Username or Password is Incorrect!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Interview web app</title>
    <!-- Below link is taken from bootsrap for css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center">
             <div class="col-lg-5 bg-light mt-5 px-0">
                 <h1 class="text-center text-light bg-danger p-3">Login page </h1>

                 <!-- Login page -->
                 <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="p-4">
                 <div class="form-group lead">
                        <center><label for="userType">Select User Type:</label><br/><br/></center> 
                        <center> <input type="radio" name="userType" value="student"
                         class="custom-radio" required>&nbsp;Student | 
                         <input type="radio" name="userType" value="recruiter"
                         class="custom-radio" required>&nbsp;Recruiter  </center>
                     </div><br/><br/>
                     <div class="form-group">
                         <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                     </div><br/><br/>
                     <div class="form-group">
                         <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                     </div><br/><br/>
                     
                     <div class="form-group">
                         <input type="submit" name="login" class="btn btn-danger btn-clock">
                     </div>
                     <!-- this messege box is displays the if any error occurs -->
                    <h5 class="text-danger text-center"><?= $msg; ?></h5>
                    </form>
                    <!-- Login page over -->

             </div>
        </div>
    </div>
</body>   
</html>