<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>  
    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <h1>Lista de pacientes</h1>
    <a href="{{url('ver_formulario_paciente')}}" class="btn btn-primary">Nuevo</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Documento</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Estado</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paci)
                <tr>
                    <td>{{$paci->id}}</td>
                    <td>{{$paci->nombre}}</td>
                    <td>{{$paci->apellido}}</td>
                    <td>{{$paci->documento}}</td>
                    <td>{{$paci->telefono}}</td>
                    <td>{{$paci->direccion}}</td>
                    @if ($paci->estado == 1)
                        <td><span class="badge text-bg-success">Si</span></td>
                    @elseif($paci->activo == 0)
                        <td><span class="badge text-bg-warning">No</span></td>
                    @else
                        <td><span class="badge text-bg-danger">Error</span></td>
                    @endif
                    <td>{{$paci->created_at}}</td>
                    <td>{{$paci->updated_at}}</td>
                    <td>
                        @if ($paci->activo == 'Activo')
                                <form action='{{route('update_pacientes', $paci->id)}}' method='post'>
                                    @csrf
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Editar
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-body">
                                                        <form action="{{route('update_paciente', $paci->id)}}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="nombre">Nombre:</label>
                                                                <input type="text" value="{{$paci->nombre}}" name="nombre"
                                                                    id="nombre" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="apellido">Apellido:</label>
                                                                <input type="text" value="{{$paci->apellido}}" name="apellido"
                                                                    id="apellido" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="documento">Documento:</label>
                                                                <input type="text" value="{{$paci->documento}}" name="documento"
                                                                    id="documento" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="telefono">Telefono:</label>
                                                                <input type="number" value="{{$paci->telefono}}" name="telefono"
                                                                    id="telefono" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="direccion">Direccion:</label>
                                                                <input type="text" value="{{$paci->direccion}}" name="direccion"
                                                                    id="direccion" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="activo">Estado:</label>
                                                                <select class="form-control" id="activo" name="estado">
                                                                    <option value="1" {{$paci->activo == 1 ? "selected" : ""}}>Activo
                                                                    </option>
                                                                    <option value="0" {{$paci->activo == 0 ? "selected" : ""}}>Inactivo
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                </form>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                <form action='{{route('desactivar', $paci->id)}}' method='post'>
                                    @csrf
                            <td><button type="submit" class="btn btn-danger">X</button></td>
                            </form>
                            </form>
                        @else
                            <form action='{{route('activar', $paci->id)}}' method='post'>
                                @csrf
                                <td><button type="submit" class="btn btn-warning">-></button></td>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>