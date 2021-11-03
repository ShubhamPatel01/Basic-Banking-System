<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <style>
        button{
        transition: 1.5s;
      }
      button:hover{
        background-color:#616C6F;
        color: white;
      }
         h2{
        color: #317e2e;
        font-weight: bold;
        transition: 0.5s;
        text-align: center;
        }
        .user_input{

/*margin-left: 20px;*/
/*color: #317e2e;*/
font-weight: bold;
transition: 0.5s;
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
    </style>

</head>
<body style="background: rgb(77,52,170);
background: linear-gradient(90deg, rgba(77,52,170,1) 0%, rgba(148,233,192,1) 100%);">
  <?php
   include 'navbar.php';
 ?>
 <form method ="post">
  <div class="container">
    <h2>Enter Account details to delete</h2>
    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
        <tr><td><label for="todelid" class = "user_input" >Enter the ID: </label></td>
            <td><input type="text" name="todelid"  required></td></tr>
           <tr> <td><label for="email" class = "user_input" >Enter the email : </label></td>
            <td><input type="email"  name="email"  required></td></tr>
   
           <tr><td colspan=2><input type="submit" class = "user_input" id="f_sub" name="del" value="Delete"></td></tr>
           </form>
        </table>
        <br/>
        <br/>
        <?php
        include 'config.php';
        if(isset($_POST['del'])){
        $id=$_POST['todelid'];
        $email = $_POST['email'];
        $sql = "DELETE FROM users WHERE id='$id' and email='$email' ";
if(mysqli_query($conn, $sql)){?>
    <h2>Account Deleted is: </h2>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Email</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $id ?></td>
                    <td class="py-2"><?php echo $email ?></td>
                </tr>
</table>
<?php
}

else{
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Account number to delete dont exist")';
        echo '</script>';
}}?>
</div>
</body>
</html>
