<!---
CRIADO: JORGE ASSUNÇÃO NETO
DATA:20/07/2024
-->

<?php

@include 'config.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM users WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'Esse Usuario ja existe!';
   }else{
      if($pass != $cpass){
         $error[] = 'as senhas não são iguais!';
      }else{
         $insert = "INSERT INTO users(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:index.php');
      }
   }
};
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/Loginstyle.css" />
    <title>Cadastro - GaragemTech</title>
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
                    <input class="login-input" type="text" name="name" required placeholder="Entre com o Nome">
                    <input class="login-input" type="email" name="email" required placeholder="Entre com o E-mail">
                    <input class="login-input" type="password" name="password" required placeholder="Entre com a Senha">
                    <input class="login-input" type="password" name="cpassword" required placeholder="Entre com a Senha novamente">
                    <select class="pass-input" name="user_type">
                        <option value="user">Cliente</option>
                        <option value="admin">Administrador</option>
                    </select>
                    <input type="submit" name="submit" value="Cadastrar" class="btn-login">
                    <p>Você ja tem uma conta? <a href="index.php">login agora</a></p>
                </div>
            </form>
        </div>
    </div>
</html>