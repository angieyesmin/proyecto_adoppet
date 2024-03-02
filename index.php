<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Adopet</title>
</head>

<body>
      
      <div class="container">
        <div class="box form-box">
            <?php 
             
             include("php/config.php");
             if(isset($_POST['submit'])){
               $email = mysqli_real_escape_string($con,$_POST['email']);
               $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['Password'] = $row['password'];
                    $_SESSION['age'] = $row['age'];
                    $_SESSION['id'] = $row['Id'];
                }else{
                    echo "<div class='message'>
                      <p>Wrong Nombre del Usuario or Contraseña</p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Go Back</button>";
         
                }
                if(isset($_SESSION['valid'])){
                    header("Location: home.php");
                }
              }else{

            
            ?>
            <div class="img">
              <img src="img/adoppegea.png">
            </div>
            <header>Registro</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="Password">Password</label>
                    <input type="Password" name="Password" id="Password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                ¿No tienes cuenta? <a href="register.php">Regístrese ahora</a>
                </div>
                
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>