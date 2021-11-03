<?php
include 'config.php';
if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }


  
    
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")'; 
        echo '</script>';
    }
    


   
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transfermoney.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style type="text/css">
    	
        h2,h4{
        color: #317e2e;
        font-weight: bold;
        transition: 0.5s;
        text-align: center;
        }
    
        .but{
	border:none;
	border-radius: 8px;
	padding: 10px;
	background:#317e2e; 
	color:white;
	letter-spacing: 1.5px;
	font-size: 15px;
	transition: 0.5s;
}
.but:hover,h2:hover,h4:hover{
	transform: scale(1.1);
}
.but:hover{
	background-color:#4C4B4B;
}
    </style>
</head>

<body style="background: rgb(77,52,170);
background: linear-gradient(90deg, rgba(77,52,170,1) 0%, rgba(148,233,192,1) 100%);">
 
<?php
  include 'navbar.php';
?>

<div class="container">
<h2 class="text-center pt-4">Transaction</h2>
<?php

if(isset($_POST['conf'])){?>
    <h3 class="text-center pt-4">Confirm receiver details and enter again</h3><?php
    $f=$_POST['to'];
    $query = "SELECT * from users where id=$f";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_fetch_array($result);
    if($rows==NULL){
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Account number dont exist")';
        echo '</script>';
    }
    else{
        ?>
        <table class="table table-hover table-sm table-striped table-condensed table-bordered">
        <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                </tr>
        <tr>
                        <td class="py-2"><?php echo $rows['id'] ?></td>
                        <td class="py-2"><?php echo $rows['name']?></td>
                        <td class="py-2"><?php echo $rows['email']?></td> 
                    </tr></table>
    <?php
    }}
?>


            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" >
        <div>
        <h3 class="text-center pt-4">Sender details</h3>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        
        <h4>Transfer To:</h4>
        <input type="number" name="to" class="form-control" required/>
        <input type="submit" name="conf" value="See Receiver" class="but"/>
        <br><br>
        
            <h4>Amount:</h4>
            <input type="number" class="form-control" name="amount" required>   
            <br>
                <div class="text-center" >
            <button class="but" name="submit" type="submit">Transfer</button>
            </div>
        </form>
    </div>
</body>
</html>