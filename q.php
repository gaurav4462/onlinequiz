<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <style>

body {
  background: #fff;
  background: linear-gradient(to bottom, #fff, #d9e4f2);
}

.container {
  background-color: #fff;
  box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
  border-radius: 5px;
  padding: 30px;
  margin-top: 50px;
}

.form-control {
  display: block;
  width: 100%;
  height: 50px;
  padding: 0.375rem 0.75rem;
  font-size: 1.2rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: none;
  border-radius: 0.25rem;
  box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
  transition: all 0.2s ease;
}

.form-control:focus {
  outline: none;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
}

.btn-primary {
  display: block;
  width: 100%;
  height: 50px;
  font-size: 1.2rem;
  font-weight: 500;
  color: #fff;
  background-color: #007bff;
  border: none;
  border-radius: 25px;
  transition: all 0.2s ease;
}

.btn-primary:hover {
  background-color: #0069d9;
  box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2);
}

.btn-primary:focus {
  outline: none;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
}







        .main{
            width: 1000px;
            height: 370px;
            border: 5px solid #cbcbcb;
            padding-left: 50px;


        }

        a {
          text-decoration: none;
          display: inline-block;
          padding: 8px 16px;
        }

        a:hover {
          background-color: #ddd;
          color: black;
        }

        .previous {
          display: flex;
          background-color: #f1f1f1;
          color: black;
        }

        .next {
          background-color: #f1f1f1;
          display: flex;
          color: black;
        }

        .save {
          background-color: #04AA6D;
          display: flex;
          color: white;
        }

        .round {
          border-radius: 50%;
        }
    </style>


        
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="path/to/your/css/file.css">


  <body class="p-3 m-0 border-0 bd-example"> -->

  <style>
    /* Style for body and main container */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.main {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
}

/* Style for question */
.question {
  font-size: 1.2em;
  font-weight: bold;
  margin-bottom: 10px;
}

/* Style for answer options */
.answer {
  margin: 10px 0;
}

.answer label {
  font-size: 1.1em;
  margin-left: 10px;
}

/* Style for buttons */
.button-container {
  margin-top: 20px;
  display: flex;
  justify-content: space-between;
}

.button-container .btn {
  font-size: 1.2em;
  font-weight: bold;
  padding: 10px;
  border-radius: 5px;
}

.previous {
  background-color: #007bff;
  color: #fff;
}

.next {
  background-color: #28a745;
  color: #fff;
}

.save {
  background-color: #ffc107;
  color: #000;
}


.main {
  max-width: 800px;
  margin: 0 auto;
}

.question-box {
  background-color: #f5f5f5;
  border: 1px solid #ddd;
  border-radius: 5px;
  padding: 10px;
  margin-bottom: 20px;
}

.options {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
}

.options div {
  margin-bottom: 10px;
}

.options input[type="radio"] {
  margin-right: 10px;
}

.button-group {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.button-group a,
.button-group button {
  padding: 10px;
  border-radius: 5px;
  color: #fff;
}

.button-group .previous {
  background-color: #6c757d;
}

.button-group .next {
  background-color: #0d6efd;
}

.button-group .save {
  background-color: #198754;
}


  </style>



  </head>

    




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
      $key1 = $_SESSION['key']++ ;
      $_SESSION['count']++ ;
    ?>

    


    

    <?php
        $key1 = $key1+1;
        if($_SESSION["count"]==6){
          header("Location: finalpage.php");
        }
        if($key1==10){
          $key1 = 1;
          $_SESSION['key'] = 1;

        }

        $_SESSION['value'] = $key1;
        


        




        $sql = "SELECT * FROM `questions` Where queid=$key1";
        $result = mysqli_query($conn, $sql);



        $num = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
    
    ?>

    
<div class="main">
  <div class="question-box">
    <?php echo "Question $_SESSION[count]: $row[question]"; ?>
  </div>
  <form action="save.php" method="POST">
    <div class="options">
      <div>
        <input type="radio" name="ans" id="option-a" value="a" />
        <label for="option-a"><?php echo "1. $row[op1]"; ?></label>
      </div>
      <div>
        <input type="radio" name="ans" id="option-b" value="b" />
        <label for="option-b"><?php echo "2. $row[op2]"; ?></label>
      </div>
      <div>
        <input type="radio" name="ans" id="option-c" value="c" />
        <label for="option-c"><?php echo "3. $row[op3]"; ?></label>
      </div>
      <div>
        <input type="radio" name="ans" id="option-d" value="d" />
        <label for="option-d"><?php echo "4. $row[op4]"; ?></label>
      </div>
    </div>
    <div class="button-group">
      <a href="Previous.php" class="previous">&laquo; Previous</a>
      <button name="save_radio" class="save">Save</button>
      <a href="next.php" class="next">Next &raquo;</a>
    </div>
  </form>
</div>

            


    
            
  </body>
</html>








   



