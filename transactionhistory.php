<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <style>
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
.but:hover,h2:hover{
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
        <h2 class="text-center pt-4">Transaction History</h2>
        <form method="post">
        <input type="number" name="t"/>
        <input type="submit" name="search" value="Search" class="but"/>
        <input type="submit" name="reset" value="Reset"  class="but"/>
    </form>
       <br>
       <div class="table-responsive-sm">
    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead>
            <tr>
                <th class="text-center">Transaction Id</th>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>

            </tr>
        </thead>
        <tbody>
        <?php
            include 'config.php';
            $query = "SELECT * from transaction";
            $result = mysqli_query($conn,$query);
            if(isset($_POST['search']))
            {
                $f = $_POST['t'];
                if($f==""){
                    echo '<script type="text/javascript">';
                    echo ' alert("Oops! Transaction number dont exist")';
                    echo '</script>';
            }
            else{
                $query = "SELECT * from transaction where t_id=$f";
                $result = mysqli_query($conn,$query);
                $rows = mysqli_fetch_array($result);
                if($rows==NULL){
                    echo '<script type="text/javascript">';
                    echo ' alert("Oops! Transaction number dont exist")';
                    echo '</script>';
                }
                else{
                    ?>
            <tr>
            <td class="py-2"><?php echo $rows['t_id']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['balance']; ?> </td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>
            </tr>
        <?php
            }}}
            elseif(isset($_POST['reset'])){
                while($rows = mysqli_fetch_assoc($result)){
                    ?>
                <tr>
            <td class="py-2"><?php echo $rows['t_id']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['balance']; ?> </td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>
            </tr>
            <?php
                }}
                else{
                    while($rows = mysqli_fetch_assoc($result)){
            ?>   
            <tr>
            <td class="py-2"><?php echo $rows['t_id']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['balance']; ?> </td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>
            </tr>
        <?php
            }}

        ?>
        </tbody>
    </table>

    </div>
</div>
</body>
</html>