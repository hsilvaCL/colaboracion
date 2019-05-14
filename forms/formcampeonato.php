<?php 
    include('../lib/constantes.php')
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario Campeonato</title>
    </head>
    <body>
        
        <div id="contenedor">
            <div id="titulo"></div>
            <div id="menu"></div>
                    <div id="contenido">
                        <form action="../lib/db.php" method="get">
                            Id campeonato: <input id="idcampeonato" name="id" type="text">
                            <br>Codigo: <input id="codigo" name="codigo" type="text">
                            <br>Nombre: <input id="nombre" name="nombre" type="text">
                            <br>Fecha de inicio:<input id="fechaini" name="fechaini" type="date">
                            <br>Fecha de termino:<input id="fechatermi" name="fechatermi" type="date">
                            <br>Cantidad de partidos: <input id="cantidad" name="cantidad" type="text">
                            <input type="submit" value="Enviar"  >                     
                        </form>
                    </div>
        </div>
        
    </body>
    

    
    
</html>