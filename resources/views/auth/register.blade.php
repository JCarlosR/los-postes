@extends('layouts.inicio')

@section('content')
    <div class="text-center">
        <h4 class="text-uppercase font-bold m-b-0">Registro</h4>
    </div>
    <div class="panel-body">
        <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <div class="col-xs-12">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                <div class="col-xs-12">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
                    @endif
                </div>
            </div>

            <div class="form-group">

                <div class="col-xs-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required>
                </div>
            </div>

            <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                    <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
                        Registrar
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
