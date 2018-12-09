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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>	
	<div class="sup-wrap">
        <header>
          <h1 id="Inicio">A Beltran Copiadora S. de R.L</h1>
        </header>      
    </div>


    <main>
        <section id="Soporte">
          <div class="form-wrapper">
            <h2>Soporte Tecnicno</h2>

            <form method="post" class="myForm">
              <div class="formContainer">
                <label>Nombre</label>
                <input type="text"  name="Nombre" id="sName">
              </div>
              <div class="formContainer">
                <label>Apellido</label>
                <input type="text"  name="Nombre" id="sLast">
              </div>
              <div class="formContainer">
                <label>Telefono</label>
                <input type="text"  name="Nombre" id="sTel" placeholder="11111111">
              </div>
              <div class="formContainer">
                <label>Correo</label>
                <input type="text"  name="Correo" id="sEmail">
              </div>
              <div class="formContainer">
                <label>Problema</label>
                <textarea rows="5" cols="21" name="Mensaje"></textarea>
              </div><button id="sopButton" type="submit" class="myButton">Send</button>
            </form> 

            <br><br>
          </div>
            <div class="form-wrapper"><h2>Cotizacion</h2>
          

          
            <form action=""  class="myForm">
              <div class="formContainer">
                <label>Nombre</label>
                <input type="text"  name="Nombre" id="cName">
              </div>
              <div class="formContainer">
                <label>Apellido</label>
                <input type="text"  name="Correo" id="cLast">
              </div>
              <div class="formContainer">
                <label>Correo</label>
                <input type="text"  name="Correo" id="cEmail">
              </div>
              <div class="formContainer">
                <label>Mensaje</label>
                <textarea rows="5" cols="21" name="Mensaje"></textarea>
              </div>
              <button id="cotButton" type="submit" class="myButton">Send</button>
            </form> 
          </div>
        </section>
    </main>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/Javascript" src="Base.js"></script> 


</body>
