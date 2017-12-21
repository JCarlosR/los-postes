@extends('layouts.inicio')

@section('content')
    @if (session('status'))
        <div class="m-t-40 card-box">
            <div class="panel-body">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Confirmar Correo</h4>
                </div>
                <div class="panel-body text-center">
                    <img src="{{ asset('images/mail_confirm.png') }}" alt="img" class="thumb-lg m-t-20 center-block" />
                    <p class="text-muted font-13 m-t-20"> Le hemos enviado un correo electrónico. Compruebe si hay un correo de la empresa y haga click en el botón para restablecer su contraseña. </p>
                </div>
                <div class="col-sm-12 text-center">
                    <p class="text-muted">Volver al <a href="/" class="text-primary m-l-5"><b>Login</b></a></p>
                </div>
            </div>
        </div>
    @else
        <div class="m-t-40 card-box">
            <div class="text-center">
                <h4 class="text-uppercase font-bold m-b-0">Reestablecer contraseña</h4>
                <p class="text-muted m-b-0 font-13 m-t-20">
                    Ingrese su correo y le enviaremos las instrucciones para reestablecer su contraseña.
                </p>
            </div>
            <div class="panel-body">
        <form class="form-horizontal m-t-20" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group text-center m-t-40 m-b-0">
                <div class="col-xs-12">
                    <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
                        Enviar correo
                    </button>
                </div>
            </div>
        </form>
</div>
</div>
    @endif
@endsection
