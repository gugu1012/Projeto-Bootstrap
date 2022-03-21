<?php
    try{
        session_start();
        if(isset($_POST['enviar'])){
            $conecta = new PDO("mysql:host=localhost;dbname=trabalho1",'root','');
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql =$conecta->prepare("SELECT email_usuario, senha_usuario FROM tb_usuario WHERE email_usuario = '$_POST[email]'");
            $sql->execute();
            $retorno = $sql->fetchAll();
            if(count($retorno)!=1){
                echo "<script> alert('Email digitada não existente'); 
                        window.location.href='login.html'; </script>";    
            }
            foreach($retorno as $dados){
                if(password_verify($_POST['senha'],$dados['senha_usuario'])){
                    $_SESSION['usuario'] = $dados['email_usuario'];
                    header("location: index.html");
                } else {
                    echo "<script> alert('Senha incorreta'); 
                      window.location.href='login.html'; </script>";    
                }
            }
        }
    } catch(PDOException $e){
        echo "[ERRO]---->".$e->getMessage();
    }
?>

