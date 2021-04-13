
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Review</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>

    <!-- Description or review php code is here -->
    <?php
      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        $name = $_POST['Name'];
        $email = $_POST['email'];
        $description = $_POST['desc'];
        

          // connecting to database
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "review";

          // create a connection
          $conn = mysqli_connect($servername,$username,$password,$database);
          // die if connection was not successful
          if(!$conn)
          {
              die("Sorry we failed to connect: ". mysqli_connect_error());
          }
          else
          {
              
              // submit this to database
              // Sql query to be executed
              $sql = "INSERT INTO `reviewus` (`Name`, `Email`, `Description`, `Date`) VALUES ('$name', '$email', '$description', current_timestamp())";
              $result = mysqli_query($conn,$sql);

              // Add a new trip to the trip table in the  database
              if($result)
              {
                echo '<div class="alert alert-success alert-dismissible fade show  mx-2" role="alert">
                <strong>Hey '. $name .'</strong> Thanks for review.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
              }
              else
              {
                  //echo "The record was not inseted successfully because fo this error --> ";
                  echo '<div class="alert alert-danger alert-dismissible fade show  mx-2" role="alert">
                <strong>Sorry </strong> Any error occure.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
              }
          }
        
      }

    ?>

    <!-- alert -->
    

    <div class="container">
        <h2 class= "text-center">Share Your Review</h2> 

        <form action= "/loginsystem/review.php" method= "post" style=
                                                                        "display: flex;
                                                                        flex-direction: column;
                                                                        align-items: center;"
        >

            <div class="col-md-3">
                <label for="Name" class="form-label" style=
                                                                        "display: block;
                                                                        text-align: center;"
                >Name</label>
                <input type="text" class="form-control" id="Name" aria-describedby="emailHelp" name='Name'>   
            </div>
            
            <div class="col-md-3">
                <label for="email" class="form-label" style=
                                                                        "display: block;
                                                                        text-align: center;"
                >Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name='email'>   
            </div>

            <div class="col-md-3">
                <label for="desc" class="form-label"  style=
                                                                        "display: block;
                                                                        text-align: center;"
               >Description</label>
               <textarea name="desc" id="desc" cols="42" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-primary col-md-3">SignUp</button>

        </form>
    
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>