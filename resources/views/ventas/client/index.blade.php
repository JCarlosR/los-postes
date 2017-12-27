@extends('layouts.app')

@section('page-title')
    Clientes
@endsection

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="sortable">
                    @if (session('notification'))
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('notification') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-8">
                            <a href="clientes/crear" class="btn btn-success btn-md waves-effect waves-light m-b-30"
                               data-overlaySpeed="200" data-overlayColor="#36404a"><i class="zmdi zmdi-money-box m-r-5"></i> Nuevo cliente</a>
                        </div><!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Tipo de cliente</th>
                                        <th>Nombre o razón social</th>
                                        <th>DNI o RUC</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($clients as $client)
                                    <tr>
                                        <td><img src="{{ asset('images/users/'.$client->image) }}" alt="Imagen del usuario" height="36"></td>
                                        <td>{{ $client->type_name }}</td>
                                        <td>
                                            @if($client->type == 'N')
                                                {{ $client->name_complete }}
                                            @elseif($client->type == 'J')
                                                {{ $client->business_name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($client->type == 'N')
                                                {{ $client->dni }}
                                            @elseif($client->type == 'J')
                                                {{ $client->ruc }}
                                            @endif
                                        </td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->address }}</td>
                                        <td>
                                            <a href="/clientes/{{ $client->id }}/editar" class="btn btn-sm btn-primary" title="Editar">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="/clientes/{{ $client->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('Seguro que desea eliminar este cliente?')">
                                                <i class="fa fa-trash o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end col -->
                    </div>

                </div><!-- Sortable -->
            </div>

        </div>

        <footer class="footer">
            2017 - 2018 © Los postes.
        </footer>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable( { keys: true } );
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
            var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
        } );
        TableManageButtons.init();

    </script>
@endsection