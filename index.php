<?php
    $insert = false;
    if(isset($_POST['name']) && isset($_POST['age']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['phone'])) {
        $server = "localhost";
        $username = "root";
        $password = '';
        $dbName = "trip";

        $con = mysqli_connect($server, $username, $password, $dbName, 6969);

        if(!$con) {
            die("Connection to this database failed due to ". mysqli_connect_error());
        }
        // echo "Connected to DB successfully!";

        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];

        $sqlQuery = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', $age, '$gender', '$email', '$phone', '$desc', current_timestamp());";

        if($con->query($sqlQuery) == true) {
            $insert = true;
            // echo "Successfully Inserted!";
        } else {
            echo "ERROR: $sqlQuery <br> $con->error";
        }

        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="./Mandir.jpg" alt="NiT">
    <div class="container">
        <h1>Welcome to Ayodhya Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
            if($insert == true) {
                echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the Ayodhya trip</p>";
                $insert = false;
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="text" name="age" id="age" placeholder="Enter your Age" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
            <input type="text" name="email" id="email" placeholder="Enter your email" required>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone" required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
</body>
</html>