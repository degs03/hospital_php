<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h1>Lista de clientes</h1>
    <a href="{{ url('ver_formulario') }}" class="btn btn-primary">Nuevo</a>

    <form action="{{ url('ver_clientes') }}" method="GET" class="my-4">
        <div class="input-group">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar por documento"
                value="{{ request()->get('buscar') }}" />
            <button type="submit" class="btn btn-success">Buscar</button>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Documento</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Activo</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cli)
                <tr>
                    <td>{{ $cli->id }}</td>
                    <td>{{ $cli->nombre }}</td>
                    <td>{{ $cli->apellido }}</td>
                    <td>{{ $cli->documento }}</td>
                    <td>{{ $cli->telefono }}</td>
                    <td>{{ $cli->direccion }}</td>
                    <td>
                        <span
                            class="badge {{ $cli->activo == 1 ? 'text-bg-success' : ($cli->activo == 0 ? 'text-bg-warning' : 'text-bg-danger') }}">
                            {{ $cli->activo == 1 ? 'Sí' : ($cli->activo == 0 ? 'No' : 'Error') }}
                        </span>
                    </td>
                    <td>{{ $cli->created_at }}</td>
                    <td>{{ $cli->updated_at }}</td>
                    <td>
                        @if ($cli->activo == 1)
                            <!-- Botón para abrir el modal de edición -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal-{{ $cli->id }}">
                                Editar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal-{{ $cli->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Editar Cliente</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('update_cliente', $cli->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="nombre">Nombre:</label>
                                                    <input type="text" value="{{ $cli->nombre }}" name="nombre" id="nombre"
                                                        class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="apellido">Apellido:</label>
                                                    <input type="text" value="{{ $cli->apellido }}" name="apellido"
                                                        id="apellido" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="documento">Documento:</label>
                                                    <input type="text" value="{{ $cli->documento }}" name="documento"
                                                        id="documento" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="telefono">Teléfono:</label>
                                                    <input type="number" value="{{ $cli->telefono }}" name="telefono"
                                                        id="telefono" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="direccion">Dirección:</label>
                                                    <input type="text" value="{{ $cli->direccion }}" name="direccion"
                                                        id="direccion" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="activo">Estado:</label>
                                                    <select class="form-control" id="activo" name="estado">
                                                        <option value="1" {{ $cli->activo == 1 ? 'selected' : '' }}>Activo
                                                        </option>
                                                        <option value="0" {{ $cli->activo == 0 ? 'selected' : '' }}>Inactivo
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Formulario para desactivar cliente -->
                            <form action="{{ route('desactivar', $cli->id) }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger">X</button>
                            </form>
                        @else
                            <!-- Formulario para activar cliente -->
                            <form action="{{ route('activar', $cli->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-warning">-></button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $clientes->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>