@extends('layouts.app')

@section('page-title')
    Hojas cotizadas
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
                            <a href="hojas-cotizadas/crear" class="btn btn-success btn-md waves-effect waves-light m-b-30"
                               data-overlaySpeed="200" data-overlayColor="#36404a"><i class="zmdi zmdi-money-box m-r-5"></i> Nueva hoja cotizada</a>
                        </div><!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Código de registro</th>
                                        <th>Nombre de la empresa</th>
                                        <th>Imagen</th>
                                        <th>Fecha de creación</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($quotedSheets as $quotedSheet)
                                    <tr>
                                        <td>{{ $quotedSheet->registration_code }}</td>
                                        <td>{{ $quotedSheet->company_name }}</td>
                                        <td>
                                            <a href="{{ asset('images/quoted-sheet/'.$quotedSheet->image) }}" class="image-popup" title="{{ $quotedSheet->company_name }}" >
                                                <img src="{{ asset('images/quoted-sheet/'.$quotedSheet->image) }}"   height="36">
                                            </a>
                                        </td>
                                        <td>{{ $quotedSheet->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <a href="/hojas-cotizadas/{{ $quotedSheet->id }}/editar" class="btn btn-sm btn-primary" title="Editar">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="/hojas-cotizadas/{{ $quotedSheet->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('Seguro que desea eliminar esta hoja cotizada?')">
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
    <script type="text/javascript" src="{{asset('plugins/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript">
        $(window).load(function(){
            var $container = $('.portfolioContainer');
            $container.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

            $('.portfolioFilter a').click(function(){
                $('.portfolioFilter .current').removeClass('current');
                $(this).addClass('current');

                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;
            });
        });
        $(document).ready(function() {
            $('.image-popup').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                }
            });
        });
    </script>
@endsection