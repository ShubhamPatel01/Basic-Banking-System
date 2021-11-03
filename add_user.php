<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style type="text/css">
    /*body{
      margin-left: 100px;
      margin-right: 100px;
    }*/
      button{
        transition: 1.5s;
      }
      button:hover{
        background-color:#616C6F;
        color: white;
      }
      .user_input{

        /*margin-left: 20px;*/
        /*color: #317e2e;*/
        font-weight: bold;
        transition: 0.5s;
      }
      h2{
        color: #317e2e;
        font-weight: bold;
        transition: 0.5s;
        text-align: center;
        }
        #f_sub{
        border:none;
        border-radius: 8px;
        padding: 10px;
        background:#317e2e; 
        color:white;
        letter-spacing: 1.5px;
        font-size: 15px;
        transition: 0.5s;
      }
      #f_sub:hover,h2:hover{
        transform: scale(1.1);
      }
      #f_sub:hover{
        background-color:#4C4B4B;
      }
      
      }
    </style>
</head>
<body style="background: rgb(77,52,170);
background: linear-gradient(90deg, rgba(77,52,170,1) 0%, rgba(148,233,192,1) 100%);">
  <?php
   include 'navbar.php';
 ?>
  <form method ="post">
  <div class="container">
    <h2>Enter User Details</h2>
    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
       <tr><td><label for="name" class = "user_input" >Enter the Name : </label></td>
         <td><input type="text" name="name" id="strr" required></td></tr>
        <tr> <td><label for="email" class = "user_input" >Enter the email : </label></td>
         <td><input type="email"  name="email" id="st1" required></td></tr>

         <tr><td><label for="balance"class = "user_input">Enter Balance : &nbsp</label></td>
         <td><input type="number"  name="balance" id="st2" required></td></tr>

        <tr><td colspan=2><input type="submit" class = "user_input" id="f_sub" name="save" value="Submit"></td></tr>
        </form>
        </table>
        <h2>New Account Details are: </h2>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
<?php
include 'config.php';
if(isset($_POST['save']))
{    
     $name = $_POST['name'];
     $email = $_POST['email'];
     $balance = $_POST['balance'];
     $sql = "INSERT INTO users (name,email,balance) VALUES ('$name','$email','$balance')";
     if (mysqli_query($conn, $sql)) {
        
     }
     mysqli_close($conn);
     $name = $_POST['name'];
     $email = $_POST['email'];
     $balance = $_POST['balance'];
     include 'config.php';
     $query= "SELECT * from users where email='$email' and balance='$balance'";
     $result = mysqli_query($conn,$query);
     While($rows = mysqli_fetch_assoc($result)){
     ?>
     
                <tr>
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['balance'] ?></td>
                </tr>
            
<?php
}}
?>
</table>
</div>
</body>
</html>