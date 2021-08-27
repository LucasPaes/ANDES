<?php
       $servidor ="localhost";
       $usuario ="root";
       $senha ="";
       $banco="andes";
       $conecta = mysqli_connect($servidor,$usuario,$senha,$banco);
   
       if(mysqli_connect_errno()){
           die("conexão falhou " . mysqli_connect_errno());
       }
   
       $consulta_produtos = "SELECT nomeproduto, precounitario, tempoentrega FROM produtos";
       $produtos = mysqli_query($conecta, $consulta_produtos);
   
       if (!$produtos){
           die("falha na consulta do BANCO DE DADOS");
       }
?>