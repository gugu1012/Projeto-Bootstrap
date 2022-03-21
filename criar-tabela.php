<?php
    try{
        $conecta = new PDO("mysql:host=localhost;dbname=trabalho1",'root','');
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE TABLE tb_usuario(id_usuario INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nm_usuario VARCHAR(150) NOT NULL, email_usuario VARCHAR(150) NOT NULL UNIQUE, 
                numero_usuario VARCHAR(50), senha_usuario VARCHAR(150) NOT NULL, sexo_usuario varchar(150),
                nascimento_usuario DATE, estado_usuario VARCHAR(150))";
        $conecta->exec($sql);
        header("Location: index.html");
    } catch(PDOException $e){
        echo "[ERRO]---> ".$e->getMessage();
    }
?>
