<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Expediente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5">
        <h1>Registrar un nuevo Expediente</h1>
        <form action="/CrearExpediente" method="POST">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="numero">Numero:</label>
                    <input type="text" name="numero" id="numero" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="anho">Año:</label>
                    <input type="text" name="anho" id="anho" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="hospital">Hospital:</label>
                    <input type="text" name="hospital" id="hospital" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="doctor">Doctor:</label>
                    <input type="text" name="doctor" id="doctor" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select class="form-control" id="activo" name="estado">
                        <option value="" disabled selected>--Selecciona una opcion--</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="inout-group mb-md">
                    <span class="inout-group-addon btn-success">Paciente</span>
                    <select class="form-control" name="id_pacientes" id="id_pacientes">
                    <option value="" disabled selected>--Selecciona una opcion--</option>
                    @foreach ($pacientes as $id => $nombre)
                    <option value="{{$id}}">{{$nombre}}</option>                    
                    @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>