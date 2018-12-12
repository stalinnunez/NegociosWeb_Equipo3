<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>A Beltran Copiadora S. de R.L</title>
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link rel="stylesheet" href="public/css/Base.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/Javascript" src="C:\xampp\htdocs\Final\public\js\Base.js"></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>	
	<div class="sup-wrap">
	    <nav> 
          <ul id="burger" class="burger">
            <li class="link"><a href="index.php?page=Inicio">Inicio</a><a href="javascript:void(0);" class="icon" onclick="burgerMenu()">&#9776;</a></li>
            <li class="link"><a href="index.php?page=mantenimiento">Mantenimiento de Productos</a></li>
            <li class="link"><a href="index.php?page=logout">Cerrar Session</a></li>
            </ul>
        </nav>
    </div>
    <div class="contenido">
       {{{page_content}}}
    </div>
<body>