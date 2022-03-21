<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        unset($_SESSION['usuario']);
        header("Location: index.html");
       } else {
        echo "<script> alert('Faça o Login primeiro'); 
                        window.location.href='login.html'; </script>";   
    }
?>