<?php

	$servername = "localhost";
        $username = "id17814549_3sbankuser";
        $password = "0owPeOXbiXAwOS@";
        $database = "id17814549_3sbank";
// Create connection
        $conn = mysqli_connect($servername, $username, $password, $database);
	if(!$conn){
		die("Unable to connect to the database due to the following error --> ".mysqli_connect_error());
	}
        $sql= "CREATE TABLE if not exists `transaction` (
                `sno` int(5) NOT NULL ,
                `sender` text NOT NULL,
                `receiver` text NOT NULL,
                `balance` int(9) NOT NULL,
                `datetime` datetime NOT NULL DEFAULT current_timestamp()
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
              $tab=mysqli_query($conn, $sql);
        if(!$tab)
        {
                die("Unable to create the table");
        } 
        $sql1="CREATE TABLE if not exists `users` (
                `id` int(5) NOT NULL,
                `name` text NOT NULL,
                `email` varchar(30) NOT NULL,
                `balance` int(8) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
              $tab1=mysqli_query($conn, $sql1);
              if(!$tab1)
              {
                      die("Unable to create the table");
              } 
?>
