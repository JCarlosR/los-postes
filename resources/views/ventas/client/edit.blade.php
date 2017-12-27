@extends('layouts.app')

@section('icon')
@endsection

@section('page-title')

    <a href="/articulos">Clientes</a> >
    {{ $client->name }} >
    <i class="fa fa-edit m-r-5"></i>Editar
@endsection
@section('content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                @if (session('notification'))
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('notification') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Datos del cliente</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombre" class="control-label">Tipo de cliente</label>
                                            <select class="form-control" name="type" id="select" onChange="mostrar(this.value);" required>
                                                <option>Seleccionar</option>
                                                <option value="N" @if($client->type == 'N') selected @endif>Natural</option>
                                                <option value="J" @if($client->type == 'J') selected @endif>Jurídico</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="N" @if($client->type == 'J') style="display: none;" @endif>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name" class="control-label">Nombre(s)</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Ingresar nombre(s)" value="{{ old('name', $client->name) }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="last_name" class="control-label">Apellidos</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Ingresar apellidos" value="{{ old('last_name', $client->last_name) }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="dni" class="control-label">DNI</label>
                                            <input type="text" class="form-control" id="dni" name="dni" data-mask="99999999" value="{{ old('dni', $client->dni) }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="J" @if($client->type == 'N') style="display: none;" @endif>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="business_name" class="control-label">Razon social</label>
                                            <input type="text" step="any" class="form-control" id="business_name" name="business_name" placeholder="" value="{{ old('business_name', $client->business_name) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="ruc" class="control-label">RUC</label>
                                            <input type="text" step="any" class="form-control" id="ruc" name="ruc" data-mask="99999999999" value="{{ old('ruc', $client->ruc) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="phone" class="control-label">Teléfono fijo</label>
                                            <input type="text" class="form-control" id="phone" name="phone" data-mask="(999)999 999" value="{{ old('phone', $client->phone) }}" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address" class="control-label">Dirección</label>
                                            <input type="text" step="any" class="form-control" id="address" name="address" placeholder="" value="{{ old('address', $client->address) }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Imagen <em>(Ingresar solo si se desea modificar)</em></label>
                                    <input type="file" name="image" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">Cargue archivos formato imagen.</small>
                                </div>
                                <div class="form-group">
                                    <a href="/clientes" class="btn btn-default">
                                        Cancelar
                                    </a>
                                    <button class="btn btn-primary">
                                        Guardar cambios
                                        <i class="fa fa-save"></i>
                                    </button>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </form>
            </div> <!-- container -->
        </div> <!-- content -->

        <footer class="footer">
            2017 - 2018 © Los postes.
        </footer>

    </div>
@endsection

@section('scripts')
    <script>
        function mostrar(id) {
            if (id == "J") {
                $("#J").show();
                $("#N").hide();
            }

            if (id == "N") {
                $("#J").hide();
                $("#N").show();
            }
        }
    </script>
@endsection