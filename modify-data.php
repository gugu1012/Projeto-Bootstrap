<?php
    if(isset($_POST['enviar'])){
        try{
            $conecta = new PDO("mysql:host=localhost;dbname=trabalho1",'root','');
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            foreach($_POST["sexo"] as $sexos){
                $sexo = $sexos;
             }
             foreach($_POST["estado"] as $estados){
                 $estado = $estados;
             }
            $sql = $conecta->prepare("UPDATE tb_usuario SET nm_usuario = '$_POST[nome]', email_usuario = '$_POST[email]',
                    numero_usuario = '$_POST[telefone]', sexo_usuario = '$sexo', nascimento_usuario = '$_POST[dtnascimento]',
                    estado_usuario = '$estado'  WHERE id_usuario = $_GET[id]");
            if($sql->execute()){
                header("Location: ../index.html");
            }
        } catch(PDOExeption $e){
            echo "[ERRO]--->".$e->getMessage();
        }
    }
?>

