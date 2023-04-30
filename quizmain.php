<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       .button1 {
            background-color: white;
            border: 2px solid black;
            color: green;
            padding: 5px 10px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            margin: 10px 30px;
            cursor: pointer;
            margin-left: 40%;
        }

        .main{
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            height: 400px;
            border: 5px solid #cbcbcb;
        }
        
        .quiz-instructions {
            margin-left: 50px;
            text-align: left;
        }
        
        .quiz-image {
            margin-left: 25px;
        }

        
    </style>

</head>
<body>
<div class="main">
        <div class="quiz-image">
            <img src="online quiz.jpg" alt="Online Quiz Image">
        </div>
        <div class="quiz-instructions">
            <h2>Instructions</h2>
            <p>Welcome to the Online Quiz. This quiz consists of 5 multiple-choice questions. You will have 30 seconds to answer each question. Good luck!</p>
            <form action="next.php">
                <button class="button1" type="submit">
                    Attempted Quiz
                </button>
            </form>
        </div>
    </div>
    </form>
    <?php
       

        session_start();
        $_SESSION['key'] = rand(1,10);
        $_SESSION['count'] = 0;


    ?>


    <?php
        $server = "localhost";
        $username = "root";
        $password = "gaurav";
        $database = "users";

        $conn = mysqli_connect($server, $username, $password, $database);
        if (!$conn){

            die("Error". mysqli_connect_error());
        }



        $sql = "DROP TABLE IF EXISTS data1 ";
        $result = mysqli_query($conn, $sql);





        $sql = "CREATE TABLE data1 (
            
            qid VARCHAR(10) NOT NULL unique,
            aid VARCHAR(10) NOT NULL ,
            rid VARCHAR(10) 
        )";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
        else{
            $showError = "Passwords do not match";
        }



    ?>


    </div>
</body>
</html>