<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="your-stylesheet.css">



  <style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f7f7f7;
}

h1 {
  text-align: center;
  margin-top: 50px;
  margin-bottom: 30px;
}

form {
  width: 80%;
  margin: 0 auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

form h3 {
  margin-top: 0;
  margin-bottom: 10px;
  font-size: 20px;
}

label {
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 10px;
}

input[type="file"] {
  display: block;
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #0062cc;
}

a.question {
  display: block;
  width: 80%;
  margin: 20px auto;
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  text-align: center;
  text-decoration: none;
}

a.question:hover {
  background-color: #0062cc;
}

    </style>
</head>
<body>
<?php
if (isset($_FILES['myfile1'])){

    $filename = $_FILES['myfile1']['name'];
    $temp = $_FILES['myfile1']['tmp_name'];

    move_uploaded_file($temp, 'partials/'. $filename);
}

if (isset($_FILES['myfile2'])){

    $filename1 = $_FILES['myfile2']['name'];
    $temp1 = $_FILES['myfile2']['tmp_name'];

    move_uploaded_file($temp1, 'partials/'. $filename1);
}

?>



<h1>Upload File</h1>

<form action="" method="post" enctype="multipart/form-data">
  <h3>Question Pdf</h3>
  <label for="myfile">Select a file: question.pdf</label>
  <input type="file" name="myfile1"><br><br>
  <input type="submit" value="Upload" />
</form>

<form action="" method="post" enctype="multipart/form-data">
  <h3>Answer Pdf</h3>
  <label for="myfile">Select files: answer.pdf</label>
  <input type="file" id="myfile2" name="myfile2" multiple><br><br>
  <input type="submit" value="Upload" />
</form>

<a href="evalution.php" type="submit" name="question" class="question">Next</a>

</body>
</html>
