<html>
<header> 
    <meta charset="utf-8"/>
    <title>Project Login</title>
    <link rel="stylesheet" href="style/style.css">
    
    <script> 
           function login(){               
            <?php require_once 'login.php';?>
           }
       </script>
</header>
<body>
<div id="form-body">
    <h1>Access Your Account</h1>
    <form method="POST">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="pass" placeholder="Password">
        <input type="submit" value="Sign In" onclick="login()">
        <a href="register.php">Not yet registered? <strong>Sign up</strong>
</div>

</body>
</html>
