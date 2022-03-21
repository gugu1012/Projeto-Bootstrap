<?php
    try{
        $conecta = new PDO("mysql:host=localhost;dbname=trabalho1",'root','');
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST["enviar"])){
            $sql = $conecta->prepare("SELECT nm_usuario FROM tb_usuario WHERE email_usuario = '$_POST[email]' ");
            $sql->execute();
            $retorno = $sql->fetchAll();
            if(count($retorno)!=0){
                echo "<script> alert('Email já cadastrado'); 
                window.location.href='cadastro.html'; </script>";
            }
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            foreach($_POST["sexo"] as $sexos){
               $sexo = $sexos;
            }
            foreach($_POST["estado"] as $estados){
                $estado = $estados;
            }
            $sql = "INSERT INTO tb_usuario(nm_usuario, email_usuario, numero_usuario, 
                    senha_usuario, sexo_usuario, nascimento_usuario, estado_usuario) 
                    VALUES ('$_POST[nome]', '$_POST[email]', '$_POST[telefone]', '$senha',
                    '$sexo','$_POST[dtnascimento]', '$estado')";
            if($conecta->exec($sql)){
                session_start();
                $_SESSION['usuario'] = $_POST['nome'];
                echo "<script> alert('Nenhum texto aqui é de minha autoria!'); 
                window.location.href='index.html'; </script>";
            }
        }
    } catch(PDOException $e){
        echo "[ERRO]--->".$e->getMessage();
    }

    }
?>