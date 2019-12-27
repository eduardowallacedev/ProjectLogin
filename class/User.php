<?php

class User{
    
    private $pdo;
    public $msgErro = "";// se vazio está ok

    public function connect($name,$host,$user,$pass){
        global $pdo;
        try{
            $pdo = new PDO("mysql:dbname=".$name.";host=".$host,$user,$pass);
        } catch(PDOException $e){
            $msgErro = $e->getMessage();
        }
        
        
    }

    public function register($name, $phone, $email, $pass){
        global $pdo;
        /* Verifica email já cadastrado */ 
        $sql = $pdo->prepare("SELECT id FROM users WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount()>0){
            return false; /** ja esta cadastrado */
        }
        else {/* Se não, cadastra */
            $sql = $pdo->prepare("INSERT INTO users (name,phone,email,pass) 
            VALUES (:n,:ph,:e,:p)");
            $sql->bindValue(":n",$name);
            $sql->bindValue(":ph",$phone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":p",md5($pass));
            $sql->execute();
            return true;
        }

        
    }

    public function login($email,$pass){
        global $pdo;
        /* Verifica se usuario cadastrado, se sim, entra no sistema */
        $sql = $pdo->prepare("SELECT id FROM users WHERE 
                                email= :e AND pass= :p");                                
        $sql->bindValue(":e",$email);
        $sql->bindValue(":p",md5($pass));
        $sql->execute();
        if($sql->rowCount() > 0)
        {/* Entrar no sistema (sessao) */
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id'] = $dado['id'];
            return true; // Logado com sucesso
        }   
        else
        {   echo "algo deu errado";
            return false; // não foi possível logar
        }                     
         
    }
}


?>