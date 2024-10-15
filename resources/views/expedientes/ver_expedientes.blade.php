<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Expedientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <h1>Lista de Expedientes</h1>
        <a href="{{url('ver_formulario_expedientes')}}" class="btn btn-primary mb-3">Nuevo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Numero</th>
                    <th>Año</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Hospital</th>
                    <th>Doctor</th>
                    <th>Paciente</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expedientes as $exp)
                    <tr>
                        <td>{{$exp->id}}</td>
                        <td>{{$exp->numero}}</td>
                        <td>{{$exp->anho}}</td>
                        <td>{{$exp->descripcion}}</td>
                        <td>{{$exp->estado}}</td>
                        <td>{{$exp->hospital}}</td>
                        <td>{{$exp->doctor}}</td>
                        <td>{{$exp->pacientes->nombre ?? 'Sin Datos'}} -
                            {{$exp->pacientes->apellido ?? 'Sin Datos'}}
                        </td>
                        <td>{{$exp->created_at}}</td>
                        <td>{{$exp->updated_at}}</td>
                        <td>
                            <a href="{{url('ver_detalle_expedientes', $exp->id)}}" class="btn btn-primary mb-3">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </td>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>