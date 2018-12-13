<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<form action="index.php?page=Editar" method="post">
    <input type="hidden" name="productocod" id="productoid" value="{{productoid}}"/>
    <input type="hidden" name="mode" id="mode" value="{{mode}}" />
    <br>
    <div class="col-12">
        <div class="form-group row container">
            <div class="col-5"></div>
            <label for="codigo-producto-input" class="col-form-label col-2">Codigo de producto: </label>
            <input readonly="true" type="text" id="codigo-producto-input" name="codigo-producto-input" value="{{productoid}}" class="form-control col-3">
        </div>
        <div class="form-group row container">
            <div class="col-5"></div>
            <label for="codigo-barra-input" class="col-form-label col-2">Codigo de barra: </label>
            <input type="text" id="codigo-barra-input" value="{{productobarra}}" name="codigo-barra-input" class="form-control col-3">
        </div>
        <div class="form-group row container">
            <div class="col-5"></div>
            <label for="descripcion-producto-input" class="col-form-label col-2">Descripción: </label>
            <textarea rows="3" id="descripcion-producto-input" name="descripcion-producto-input" class="form-control col-3">{{productodsc}}</textarea>
        </div>
        <div class="form-group row container">
            <div class="col-5"></div>
            <label for="cantidad-producto-input" class="col-form-label col-2">Cantidad: </label>
            <input type="number" value="{{productocant}}" id="cantidad-producto-input" name="cantidad-producto-input" class="form-control col-1">
        </div>
        <div class="form-group row container">
            <div class="col-5"></div>
            <label for="estado-producto-select" class="col-form-label col-2">Estado: </label>
            <select value="{{productoest}}" id="estado-producto-select" name="estado-producto-select" class="form-control col-3">
                <option>Activo</option>
                <option>Inactivo</option>
            </select>
        </div>
        <br> <br>
        <div class="row">
            <div class="col-4"></div>
            <div style="margin-left:25px"></div>
            <button class="btn btn-success col-3" name="btnGuardar" >
                Guardar
            </button>
        </div>
    </div>
</form>
</body>
</html>