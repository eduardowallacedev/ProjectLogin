<?php
    require_once 'class/User.php';
    $u = new User;
?>

<html>
<header> 
    <meta charset="utf-8"/>
    <title>Projeto Login</title>
    <link rel="stylesheet" href="style/style.css">
</header>
<body>
<div id="form-body-reg">
    <h1>Register Account</h1>
    <form method="POST" >
        <input type="text" name="name" placeholder="Complete Name" maxlength="30">
        <input type="text" name="phone" placeholder="Phone" maxlength="30">
        <input type="email" name="email" placeholder="User/E-mail" maxlength="40">
        <input type="password" name="pass" placeholder="Pass" maxlength="32">
        <input type="password" name="confPass" placeholder="Confirm Pass" maxlength="32">
        <input type="submit" value="Register">
</div>
<?php
// Verificar se houve clique no botao
if(isset($_POST['name']))
{
    $name = addslashes($_POST['name']);
    $phone = addslashes($_POST['phone']);
    $email = addslashes($_POST['email']);
    $pass = addslashes($_POST['pass']);
    $confPass = addslashes($_POST['confPass']);
    // verificar se há campo vazio
    if(!empty($name) && !empty($phone) && !empty($email) && !empty($pass) && !empty($confPass))
    {
        $u->connect("project_login","localhost","root","");
        if($u->msgErro == "") // esta ok
        { 
            if($pass == $confPass)
            {
                if($u->register($name,$phone,$email,$pass))
                {
                    ?>
                    <div class="msg-sucess">Cadastrado com sucesso!
                    </div>
                    
                    <?php
                } else 
                {
                    ?>
                    <div class="msg-error">Email já cadastrado
                    </div>
                    
                    <?php
                    
                };
            } 
            else 
            {
                ?>
                <div class="msg-error">As senhas digitadas estão diferentes!
                </div>
                
                <?php
            }

        } 
        else 
        {
            ?>
                <div class="msg-error">
                <?php echo "Erro: ".$u->msgErro;?>
                </div>
                <?php
     
        }
    } 
    else 
    {
        ?>
        <div class="msg-error">Preencha todos os campos!
        </div>    
        <?php
    }
}
?>
</body>
</html>