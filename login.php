<?php
require_once 'class/User.php';
$u = new User;

if(isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $pass = addslashes($_POST['pass']);


    if(!empty($email) && !empty($pass))
    {
       $u->connect("project_login","localhost","root","");
       if($u->msgErro == "") // esta ok
            {
                if($u->login($email,$pass))
                    {
                        echo "ok";
                        header("location: home.php");                         
                    }
                else 
                {  echo "aqui";
                    ?>
                    <div class="msg-error">Email e/ou senha estão incorretos!
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
     }
    else 
    {
        ?>
        <div class="msg-error">Preencha todos os campos
        </div>
        <?php
    } 