<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@800&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <title>Basic Banking System</title>
  </head>

  <body style="background: rgb(77,52,170);
background: linear-gradient(90deg, rgba(77,52,170,1) 0%, rgba(148,233,192,1) 100%);" >
  <?php
  include 'navbar.php';
  ?>
  
      <div class="container-fluid">
      
            <div class="row intro py-1">
              <div class="col-sm-12 col-md">
                <div class="heading text-center my-5">
                  <h3>Welcome to</h3>
                  <h1>THE BANK OF 3S</h1>
                </div>
              </div>
              <div class="col-sm-12 col-md img text-center">
                <img class="im" src="img/bank.png" class="img-fluid pt-2">
              </div>
            </div>

      
          <br>
          <br>
          <br>
          <h3 class="action" ><span style="font-family: 'Roboto Slab', serif">CHOOSE AN ACTION</h3></span>
            <div class="column activity text-center">
                  
                  <div class="col-md act">
                   
                    <br>
                    <br>
                    <br>
                    <a href="transactionhistory.php"><button>Transfer History</button></a>
                  </div>

                  <div class="col-md act">
                   
                    <br>
                    <br>
                    <br>
                    <a href="transfermoney.php"><button>Funds Transfer</button></a>
                  </div>
                  
            </div>
           
      </div>
      <br>
      <footer class="text-center mt-5 py-2">
        <p>A Project by <b>SHUBHAM , SHIWANSH & SHLOK</b> <br> </p>
      </footer>
     
  </body>
</html>