<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <br> <br>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Código de barra</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
            {{foreach productos}}
                <tr>
                    <th scope="row" name="codigo_producto_input">{{productoid}}</th>
                    <td>{{productodsc}}</td>
                    <td>{{productobarra}}</td>
                    <td>{{productocant}}</td>
                    <td>{{productoest}}</td>
                    <td>
                    <form action="index.php?page=Editar" method="post"></form>
                        <input type="hidden" value="{{productoid}}" name="codigo-producto-input">
                        <a href="index.php?page=Editar" class="btn btn-warning" name="btnEditar">
                            <span style="color: white">
                                Editar
                            </span> 
                        </a> 
                    </td>
                </tr>
            {{endfor productos}}
            </tbody> 
        </table>
        <form action="index.php?page=Editar" method="post">
            <button class="btn btn-success" name="btnAgregar">Agregar</button>
        </form>
    </div>
</body>
</html>