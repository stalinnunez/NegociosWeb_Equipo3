<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton|Oswald" rel="stylesheet">
    <title>Usuario</title>
  </head>
  <body >
<header>
<h1>CREA TU CUENTA</h1>
</header>

<div class="Formulario">
<h2>Datos</h2>
<br>
<div class="ingresarDatos">
<form action="index.php?page=crear" method="post" id=agregarUsuario>
<div class="Separar">
  <label>Nombre Completo</label>
<input type="text" name="txtNombre" value="{{txtNombre}}" placeholder="Nombre Completo" id="txtNombre"><br><br>
</div>
<label>Correo Electronico</label>
<input type="text" name="txtMail" value="{{txtMail}}" placeholder="Correo Electronico" id="txtMail"><br><br>
<label>Contraseña</label>
<input type="password" name="txtPswd" value="{{txtPswd}}" placeholder="Contraseña" id="txtPswd" ><br><br>
<label>Conf. Contraseña</label>
<input type="password" name="txtPswdConf" value="{{txtPswdConf}}" placeholder="Confirmar Contraseña" id="txtPswdConf" ><br>
</div>
<input type="submit" name="btnGuardar" value="Guardar" id="btnGuardar">
</form>
</div>
</body>
</html>
