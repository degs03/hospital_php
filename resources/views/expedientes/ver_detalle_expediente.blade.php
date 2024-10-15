<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expediente Detalle</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
        }

        .card-header {
            background-color: #e9ecef;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>Detalles del Expediente</h1>
        <a href="{{ url('ver_expedientes') }}" class="btn btn-primary mb-3">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
        </a>

        <div class="card mb-3">
            <h5 class="card-header">Número de Expediente: {{$expediente->numero}}</h5>
            <div class="card-body">
                <p class="card-text"><strong>Descripción:</strong> {{$expediente->descripcion}}</p>
                <p class="card-text"><strong>Estado:</strong> {{$expediente->estado}}</p>
                <p class="card-text"><strong>Hospital:</strong> {{$expediente->hospital}}</p>
                <p class="card-text"><strong>Doctor:</strong> {{$expediente->doctor}}</p>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">Datos del Paciente</div>
            <div class="card-body">
                <h6 class="card-text"><strong>Nombre:</strong>
                    {{$expediente->pacientes->nombre ?? 'Sin Datos'}}
                    {{$expediente->pacientes->apellido ?? 'Sin Datos'}}
                </h6>
                <p class="card-text"><strong>Documento:</strong> {{$expediente->pacientes->documento ?? 'Sin Datos'}}
                </p>
                <p class="card-text"><strong>Teléfono:</strong> {{$expediente->pacientes->telefono ?? 'Sin Datos'}}</p>
                <p class="card-text"><strong>Estado:</strong>
                    {{$expediente->pacientes->estado == 1 ? 'Activo' : 'Inactivo'}}
                </p>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">Consultas Relacionadas</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Síntomas</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Tipo Consulta</th>
                            <th scope="col">Receta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultas as $cons)
                            <tr>
                                <td>{{$cons->id ?? 'Sin Datos'}}</td>
                                <td>{{$cons->fecha ?? 'Sin Datos'}}</td>
                                <td>{{$cons->sintomas ?? 'Sin Datos'}}</td>
                                <td>{{$cons->descripcion ?? 'Sin Datos'}}</td>
                                <td>{{$cons->estado ?? 'Sin Datos'}}</td>
                                <td>{{$cons->tipo_consulta ?? 'Sin Datos'}}</td>
                                <td>{{$cons->receta ?? 'Sin Datos'}}</td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>