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
      .btn{
        transition: 1.5s;
      }
      .btn:hover{
        background-color:#616C6F;
        color: white;
      }
      h2{
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
    

?>

<?php
  include 'navbar.php';
?>

<div class="container">
        <h2 class="text-center pt-4">Transfer Money</h2>
        <form method="post">
        <input type="number" name="i"/>
        <input type="submit" name="search" value="Search" class="but"/>
        <input type="submit" name="reset" value="Reset" class="but"/>
    </form>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center py-2">Bank Id</th>
                            <th scope="col" class="text-center py-2">Name</th>
                            <th scope="col" class="text-center py-2">E-Mail</th>
                            <th scope="col" class="text-center py-2">Balance</th>
                            <th scope="col" class="text-center py-2">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                include 'config.php';
                $query = "SELECT * from users";
                $result = mysqli_query($conn,$query);
                if(isset($_POST['search']))
                {
                    $f = $_POST['i'];
                    if($f==""){
                        echo '<script type="text/javascript">';
        echo ' alert("Oops! Account number dont exist")';
        echo '</script>';
                    }
                    else{
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
                    <tr>
                        <td class="py-2"><?php echo $rows['id'] ?></td>
                        <td class="py-2"><?php echo $rows['name']?></td>
                        <td class="py-2"><?php echo $rows['email']?></td>
                        <td class="py-2"><?php echo $rows['balance']?></td>
                        <td><a href="selecteduserdetail.php?id= <?php echo $rows['id'] ;?>">
                         <button type="button" class="btn">Show Details/Transfer</button></a></td> 
                    </tr>
                <?php
                    }}}
                    elseif(isset($_POST['reset'])){
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                            <td class="py-2"><?php echo $rows['id'] ?></td>
                                    <td class="py-2"><?php echo $rows['name']?></td>
                                    <td class="py-2"><?php echo $rows['email']?></td>
                                    <td class="py-2"><?php echo $rows['balance']?></td>
                                    <td><a href="selecteduserdetail.php?id= <?php echo $rows['id'] ;?>">
                                     <button type="button" class="btn">Show Details/Transfer</button></a></td>  
                                    </tr>
                                    
                                
                                <?php
                                }}
                    else{
                        while($rows = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                <td class="py-2"><?php echo $rows['id'] ?></td>
                        <td class="py-2"><?php echo $rows['name']?></td>
                        <td class="py-2"><?php echo $rows['email']?></td>
                        <td class="py-2"><?php echo $rows['balance']?></td>
                        <td><a href="selecteduserdetail.php?id= <?php echo $rows['id'] ;?>">
                         <button type="button" class="btn">Show Details/Transfer</button></a></td> 

                        </tr>
                    <?php
                    }}
                    ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>
</body>
</html>