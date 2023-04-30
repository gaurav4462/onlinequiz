<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        * {
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.div2 {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0;
}

.div1 {
  width: calc(25% - 10px);
  background-color: #f2f2f2;
  border-radius: 5px;
  padding: 10px;
  text-align: center;
}

.div3 {
  margin-top: 20px;
  background-color: #f2f2f2;
  border-radius: 5px;
  padding: 10px;
}

.div3:nth-child(odd) {
  background-color: #e6e6e6;
}

.div3 h2 {
  margin-top: 0;
}

@media (max-width: 768px) {
  .div1 {
    width: calc(50% - 10px);
  }
}

div a {
  display: inline-block;
  background-color: #007bff;
  color: #fff;
  padding: 10px;
  border-radius: 5px;
  text-decoration: none;
  margin-top: 20px;
}

div a:hover {
  background-color: #0062cc;
}

.button {
  display: inline-block;
  background-color: #ff4500;
  color: #fff;
  padding: 10px;
  border-radius: 5px;
  text-decoration: none;
  margin-top: 20px;
}

.button:hover {
  background-color: #d6341d;
}



    </style>

    

    
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



    $sql2 = "SELECT *
    FROM ans
    WHERE Correct is NOT NULL";
    $result2 = mysqli_query($conn, $sql2);
    
    $num2 = mysqli_num_rows($result2);



    $sql3 = "SELECT *
    FROM ans
    WHERE Incorrect is NOT NULL";
    $result3 = mysqli_query($conn, $sql3);
    
    $num3 = mysqli_num_rows($result3);
    



    ?>




    <div class="div2">
    <div class="div1">
        &nbsp No Of Question <br> <br>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo "$num1" ?>
    </div>

    <div class="div1">
        &nbsp total attepted <br> <br>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo "$num" ?>
    </div>

    <div class="div1">
        &nbsp Correct Answer <br> <br>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo "$num2" ?>
    </div>

    <div class="div1">
        &nbsp Incorrect Answer <br> <br>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo "$num3" ?>
    </div>
    </div>

    

    <div class="div3">
        Correct questions  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 

        <?php

        $sql = "SELECT Correct FROM `ans` Where Correct IS NOT NULL";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);


        $row = mysqli_fetch_assoc($result);

        if($row==null){
            echo "0";
        }
        else{


        echo $row["Correct"] ;
        echo   " ";
        echo   " ,";

        while ($row = mysqli_fetch_assoc($result)) {
            echo $row["Correct"] ;
            echo   " ";
            echo   " ,";
            
          }
        }?>;
    </div>

    <div class="div3">
        Incorrect questions 
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 

        <?php

        $sql = "SELECT Incorrect FROM `ans` Where Incorrect IS NOT NULL";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);


        $row = mysqli_fetch_assoc($result);

        if($row==null){
            echo "0";
        }
        else{
        echo $row["Incorrect"] ;
        echo   " ";
        echo   " ,";

        while ($row = mysqli_fetch_assoc($result)) {
            echo $row["Incorrect"] ;
            echo   " ";
            echo   " ,";
            
          }
        }?>;
    </div>

    <div>
     <a href="download new.php" >Download PDF</a>
    </div>

    <div>
    <a href="logout.php" class="button">Logout</a>
    </div>


    <?php

// // Database connection information
// $servername = "localhost";
// $username = "username";
// $password = "gaurav";
// $dbname = "";

// // Create a connection to the database
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check the connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // SQL query to retrieve data from the database
// $sql = "SELECT id, name, email, phone FROM users";

// // Execute the query and store the result
// $result = $conn->query($sql);

// // Check if there is any data returned
// if ($result->num_rows > 0) {
//     // Start the table
    echo "<table>";
    
    // Add the table headers
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Phone</th>";
    echo "</tr>";

    // Loop through each row of data and add it to the table
//     while ($row = $result->fetch_assoc()) {
//         echo "<tr>";
//         echo "<td>" . $row["id"] . "</td>";
//         echo "<td>" . $row["name"] . "</td>";
//         echo "<td>" . $row["email"] . "</td>";
//         echo "<td>" . $row["phone"] . "</td>";
//         echo "</tr>";
//     }

//     // End the table
//     echo "</table>";
// } else {
//     echo "No data found.";
// }

// // Close the database connection
// $conn->close();

?>



    


</body>
</html>