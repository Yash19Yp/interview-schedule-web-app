<!DOCTYPE html>
<html>
    <head>
        <title>Recruiter page</title>
        <style>
            table, th, td {
            border: 1px solid black;
            }

            table {
            width: 100%;
            }
        </style>
        
    </head>
<body class="bg-dark">
    <h3><p align="center">Recruiter page</p></h3>
    <p align="right"><a href="logout.php" class="a">logout</a></p>
    <h2>Students List</h2>
    <!-- One table if created in this table it takes info from data base and shows the list of students who has interest in their company -->
    <table>
        <tr>
            <th>Name</th>
            <th>Enrollment Num</th>
            <th>Email id</th>
            <th>Area of interest</th>
            <th>Cgpa</th>
        </tr>
        <!-- php session for taking data from data base and display on the recruiters page -->
        <?php
            session_start();
            $conn = new mysqli("localhost","root","","task1");
            $sql = "SELECT studentname, email, enno, aoi, cgpa from student";
            $result = $conn-> query($sql);
            if ($conn-> connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            }
            if(!isset($_SESSION['username']) || $_SESSION['role']!="recruiter"){
                header("location:index.php");
            }
            if ($result-> num_rows >0){
                while ($row = $result-> fetch_assoc()){
                    echo "<tr><td>".$row["studentname"] ."</td><td>" .$row["enno"] . "</td><td>".$row["email"] . "</td><td>".$row["aoi"] . "</td><td>".$row["cgpa"] ."</td></tr>";
                }
                echo "</table>";
            }
            else {
                echo "0 result";
            }
        ?>
        <!-- php session over -->
    </table>
</body>
</html>