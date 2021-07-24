<?php
    // connect to the data base
    session_start();
    $conn = new mysqli("localhost","root","","task1");
    function function_alert($message) { 
      
		// Display the alert box  
		echo "<script>alert('$message');</script>"; 
		echo "<script>window.location.href = 'student.php'</script>";
	}
    $msg="";
    if(isset($_POST['submit'])){
        $studentname = $_POST['studentname'];
        $email = $_POST['email'];
        $enno = $_POST['enno'];
        $aoi = $_POST['aoi'];
        $cgpa = $_POST['cgpa'];

        // below query inserts the data into the student database
        $sql = "INSERT INTO student (studentname, email, enno, aoi, cgpa)
	    VALUES ('$studentname','$email','$enno','$aoi','$cgpa')";
        
        session_regenerate_id();
        $_SESSION['studentname']=$row['studentname'];
        $_SESSION['aoi'] = $row['aoi'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['enno'] = $row['enno'];
        $_SESSION['cgpa'] = $row['cgpa'];
        session_write_close();
        // calling the alert box for popup
        if ($conn->query($sql) === TRUE) 
        {
            function_alert("Your details are sent to company successfully..");
        } 
        else 
        {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Interview web app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center">
             <div class="col-lg-5 bg-light mt-5 px-0">
                 <h1 class="text-center text-light bg-danger p-3">Form for placement</h1>

                 <!-- This is the form which is used by the user to send details to the perticular company -->
                 <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="p-4">
                     <div class="form-group">
                        Student Name: <input type="text" name="studentname" class="form-control form-control-lg" placeholder="studentname" required>
                     </div><br/>
                     <div class="form-group">
                        Email Id:<input type="email" name="email" class="form-control form-control-lg" placeholder="Email Id" required>
                     </div><br/>
                     <div class="form-group">
                        Enrollment No: <input type="int" name="enno" class="form-control form-control-lg" placeholder="Enrollment Number" required>
                     </div><br/>
                     <div class="form-group lead">
                        <center><label for="userType">Select area of interest:</label><br/><br/></center> 
                        <center> <input type="radio" name="aoi" value="reactjs"
                         class="custom-radio" required>&nbsp;React js | 
                         <input type="radio" name="aoi" value="nodejs"
                         class="custom-radio" required>&nbsp;Node js</center>
                     </div><br/>
                     <div class="form-group">
                        Cgpa till last Sem: <input type="int" name="cgpa" class="form-control form-control-lg" placeholder="Enter your cgpa till last sem" required>
                     </div><br/>
                     <div class="form-group">
                         <input type="submit" name="submit" class="btn btn-danger btn-clock">
                     </div>
                     <!-- this messege box is displays the if any error occurs -->
                    <h5 class="text-danger text-center"><?= $msg; ?></h5>
                    </form>
                    <!-- form over -->
             </div>
        </div>
    </div>  
</body>   
</html>