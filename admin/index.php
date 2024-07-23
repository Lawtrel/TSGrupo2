<!---
CRIADO: JORGE ASSUNÇÃO NETO
DATA:20/07/2024
--> 

<?php

@include './config/config.php';

session_start();

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM users WHERE email = '$email' AND password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin.php');

      }elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');
      }
   }else{
      $error[] = 'Senha ou E-mail invalidos!';
   }
};
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/Loginstyle.css" />
    <title>GaragemTech - Login</title>
</head>
<body>
    <div class="main">
        <div class="left-container">
                <img src="./assets/oficine.png" class="left-logo" alt="Logo da GaragemTech">
                <h1 >A oficina do futuro é digital</h1>
        </div>

        <div class="right-container">
            <form action="" method="post">
                <div class="card-login">
                    <img src="./assets/logo.png" class="logo" alt="logo da GaragemTech">
                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                            };
                        };
                    ?>
                    <input class="login-input" type="email" name="email" required placeholder="Entre com o E-mail">
                    <input class="login-input" type="password" name="password" required placeholder="Entre com a Senha">
                    <input type="submit" name="submit" value="Login" class="btn-login">
                    <p>Você não tem uma conta? <a href="Register.php">registre agora</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>