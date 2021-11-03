<<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title></title>
</head>
<body>
<?php
include 'config.php';
if(isset($_POST['save']))
{    
     $name = $_POST['name'];
     $email = $_POST['email'];
     $balance = $_POST['balance'];
     $sql = "INSERT INTO users (name,email,balance) VALUES ('$name','$email','$balance')";
     if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
     } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
</body>
</html>
