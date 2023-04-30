<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

session_start();
echo $_SESSION["value"];

$sql = "SELECT * FROM questions where queid = $_SESSION[value]";
$result = mysqli_query($conn, $sql);



$num = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);






if(isset($_POST['save_radio']))
{
    $abc = $_POST['ans'];

    $query = "INSERT INTO data1 (qid,aid,rid) VALUES ('$_SESSION[value]','$row[ansid]','$abc')";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: next.php");
    }
    else{
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: next.php");
    }
}
?>
</body>
</html>




