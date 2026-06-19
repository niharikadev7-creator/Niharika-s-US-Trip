<?php
$insert = false;
if(isset($_POST['name'])){
    //set connection variables
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "trip";
//create a database connection
    // $con = mysqli_connect($server, $username, $password);

    $con = mysqli_connect($server, $username, $password, $dbname);

    //check for connection succes

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());

    }

    // echo "Success connecting to the db"; 

    //Collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = " INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;
//Execute the query

    // if($con->query($sql) == true){
    //     // echo "Successfully inserted";

    //     //flag for successful insertion

    //     $insert = true;
    // }
    // else{
    //     echo "ERROR: $sql <br> $con-> error";
    //     // $not_insert = true;
    // }

    if($con->query($sql)== TRUE){
        $insert = true;
    }
    else{
        die("SQL Error:" . $con->error);
    }
//close the databse connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Black+Ops+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="w.jpg" alt="Image">
    <div class="container">
        <h1>Welcom to Niharika's US Trip Form</h1>
        <p>Enter your details and submit this form to conform your participation in the trip</p>

        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
?>
        <form action="back.php" method="post">
            <input type="text" name = "name" id="name" placeholder="Enter your name">
            <input type="text" name = "age" id="age" placeholder="Enter your Age">
            <input type="text" name = "gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">

            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->


        </form>
    </div>
    <script src="fun.js"></script>

   
</body>
</html>