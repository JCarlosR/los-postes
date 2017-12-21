@extends('layouts.inicio')

@section('content')
    <div class="m-t-40 card-box">
    <div class="text-center">
        <h4 class="text-uppercase font-bold m-b-0">Reestablecer contraseña</h4>
    </div>

    <div class="panel-body">
        <form class="form-horizontal m-t-20" method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Correo" required autofocus>

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

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group text-center m-t-40 m-b-0">
                <div class="col-xs-12">
                    <button class="btn btn-success btn-bordred btn-block waves-effect waves-light" type="submit">
                        Reestablecer contraseña
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>

@endsection
