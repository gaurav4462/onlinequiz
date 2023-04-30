<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">

    <style>
     /* Apply a basic style to the body of the page */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

/* Style the container that holds the content */
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
}

/* Style the header element */
.header {
    text-align: center;
    margin-bottom: 20px;
}

/* Style the question and attempted sections */
.question, .attempted {
    display: inline-block;
    width: 50%;
    text-align: center;
}

.question p, .attempted p {
    font-weight: bold;
    margin-bottom: 10px;
}

.question h2, .attempted h2 {
    font-size: 3em;
    margin: 0;
}

/* Style the button container and buttons */
.buttons {
    text-align: center;
    margin-top: 40px;
}

.button {
    display: inline-block;
    margin: 0 10px;
}

/* Style the primary button */
.btn-primary {
    display: inline-block;
    padding: 10px 20px;
    border: 2px solid #007bff;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    font-size: 1.2em;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
}

.btn-primary:hover {
    background-color: #fff;
    color: #007bff;
}

/* Style the secondary button */
.btn-secondary {
    display: inline-block;
    padding: 10px 20px;
    border: 2px solid #6c757d;
    border-radius: 5px;
    background-color: #6c757d;
    color: #fff;
    font-size: 1.2em;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
}

.btn-secondary:hover {
    background-color: #fff;
    color: #6c757d;
}

/* Style the tertiary button */
.btn-tertiary {
    display: inline-block;
    padding: 10px 20px;
    border: 2px solid #28a745;
    border-radius: 5px;
    background-color: #28a745;
    color: #fff;
    font-size: 1.2em;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
}

.btn-tertiary:hover {
    background-color: #fff;
    color: #28a745;
}

    </style>




</head>
<body>

<div class="container">

    <div class="header">
        <h3>Note: File name must be question and answer</h3>
    </div>

    <?php
    $server = "localhost";
    $username = "root";
    $password = "gaurav";
    $database = "users";
    
    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn){
        die("Error". mysqli_connect_error());
    }
    ?>

    <?php

    $sql = "SELECT *
    FROM data1
    WHERE rid = 'a' or rid = 'b' or rid = 'c' or rid = 'd';";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    $sql1 = "SELECT *
    FROM data1
    WHERE rid is NOT NULL";
    $result1 = mysqli_query($conn, $sql1);
    $num1 = mysqli_num_rows($result1);
    session_start()
    
    ?>
    

    <div class="question">
        <p>No. of Questions:</p>
        <h2><?php echo $_SESSION["count"] -1 ?></h2>
    </div>

    <div class="attempted">
        <p>Total Attempted:</p>
        <h2><?php echo "$num" ?></h2>
    </div>

    <div class="buttons">
        <div class="button">
            <a href="download question.php" class="btn-primary">Download Question Paper</a>
        </div>
        <div class="button">
            <a href="download answer.php" class="btn-secondary">Download Answer Key</a>
        </div>
        <div class="button">
            <a href="upload.php" class="btn-tertiary">View Score</a>
        </div>
    </div>

</div>


</body>
</html>
