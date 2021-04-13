
<?php
  // success full login alert
  $login = false;
  $showError = false;
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    

    include 'partials/_dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

      $sql = "Select * from users where username= '$username' AND password=  '$password' ";
      
      // $result = mysqli_query($conn, "Select * from users where username= '$username' AND
      // password=  '$password'" );
      $result = mysqli_query($conn, $sql );
      $num = mysqli_num_rows($result);
      if($num==1)
      {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: welcome.php");
      }
      else
      {
        $showError = "Password dosen't match";
      }

    }
  
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>

<!-- alert code of php is here -->
<?php 
if($login)
{
  echo '<div class="alert alert-success alert-dismissible fade show  mx-2" role="alert">
  <strong>Huraahhh....!</strong> You logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

}
if($showError)
{
  echo '<div class="alert alert-danger alert-dismissible fade show  mx-2" role="alert">
  <strong>Ops!</strong> Something went wrong.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

}
?>
    

        

    <!-- alert -->
    

    <div class="container">
        <h2 class= "text-center">Login<br> Quick codes</h2> 

        <form action= "/loginsystem/login.php" method= "post" style=
                                                                        "display: flex;
                                                                        flex-direction: column;
                                                                        align-items: center;"
        >

            <div class="col-md-3">
                <label for="username" class="form-label" style=
                                                                        "display: block;
                                                                        text-align: center;"
                >Username</label>
                <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name='user'>   
            </div>
            
            <div class="col-md-3">
                <label for="password" class="form-label"  style=
                                                                        "display: block;
                                                                        text-align: center;"
               >Password</label>
                <input type="password" class="form-control" id="password" name='pass'>
            </div>

           
            
            <button type="submit" class="btn btn-primary col-md-3">Login</button>

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

 -->