<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      body {
        background-color: #f5f5f5;
      }
      .main {
        margin: 50px auto;
        max-width: 600px;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 30px;
        /* text-align: center; */
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      }
      h1 {
        font-size: 28px;
        margin-top: 0;
      }
      .options {
        text-align: left;
      }
      .options label {
        display: block;
        margin-bottom: 10px;
      }
      .previous, .next, .save {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        margin-top: 20px;
        font-size: 16px;
        transition: all 0.3s ease;
      }
      .previous:hover, .next:hover, .save:hover {
        background-color: #0062cc;
      }
      .previous {
        margin-right: 20px;
      }
    </style>


        
    
  </head>
  <body class="p-3 m-0 border-0 bd-example">


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
      $key1 = $_SESSION['key']-- ;
      $_SESSION['count']-- ;
    ?>


    


    

    <?php
        $key1 = $key1-1;
        if($_SESSION['count']==0){
          $_SESSION['count']++;
          $key1++;
          
          $_SESSION["key"]++;
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








   



