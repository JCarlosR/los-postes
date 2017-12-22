@extends('layouts.app')

@section('page-title')
    Cotizaciones
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
                            <a href="cotizacion/crear" class="btn btn-success btn-md waves-effect waves-light m-b-30"
                               data-overlaySpeed="200" data-overlayColor="#36404a"><i class="zmdi zmdi-money-box m-r-5"></i> Nueva cotización</a>
                        </div><!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Forma de pago</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($quotations as $quotation)
                                    <tr>
                                        <td>{{ $quotation->id }}</td>
                                        <td>{{ $quotation->name }}</td>
                                        <td>{{ $quotation->phone }}</td>
                                        <td>
                                            @if( $quotation->payment == 'CRE')
                                                CRÉDITO
                                            @else
                                                CONTADO
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/cotizacion/{{ $quotation->id }}/detalles" class="btn btn-sm btn-warning" title="Ver detalles">
                                                <i class="fa fa-wpforms"></i>
                                            </a>
                                            <a href="/cotizacion/{{ $quotation->id }}/editar" class="btn btn-sm btn-primary" title="Agregar articulos">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="/cotizacion/{{ $quotation->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('Seguro que desea eliminar esta cotización?')">
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