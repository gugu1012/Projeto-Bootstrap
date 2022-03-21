<?php
    try{
        $conecta = new PDO("mysql:host=localhost",'root','');
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE trabalho1";

        $conecta->exec($sql);
        header("location: criar-tabela.php");
    } 
    catch(PDOExptio $e){
        echo "[ERRRO]----> ".$e->getMessage();
    }
?>