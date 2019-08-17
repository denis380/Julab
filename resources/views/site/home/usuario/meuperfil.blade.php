@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'register-page')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Alterar meus Dados</p>

            <form action="{{ url('storeperfil') }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" value="<?php echo auth()->user()->name;?>">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="<?php echo auth()->user()->email;?>"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=Div que eu implementei =-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="form-group has-feedback {{ $errors->has('telefone') ? 'has-error' : '' }}">
                    <input type="text" name="telefone" class="form-control" value="<?php echo auth()->user()->telefone;?>">
                    <span class="glyphicon glyphicon glyphicon-earphone form-control-feedback"></span>
                    @if ($errors->has('telefone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telefone') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=Div que eu implementei =-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="form-group has-feedback {{ $errors->has('estado') ? 'has-error' : '' }}">
                    <input type="text" name="estado" class="form-control" value="<?php echo auth()->user()->estado;?>">
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    @if ($errors->has('estado'))
                        <span class="help-block">
                            <strong>{{ $errors->first('estado') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=Div que eu implementei =-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="form-group has-feedback {{ $errors->has('cidade') ? 'has-error' : '' }}">
                    <input type="text" name="cidade" class="form-control" value="<?php echo auth()->user()->cidade;?>">
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    @if ($errors->has('cidade'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cidade') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=Div que eu implementei =-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="form-group has-feedback {{ $errors->has('bairro') ? 'has-error' : '' }}">
                    <input type="text" name="bairro" class="form-control" value="<?php echo auth()->user()->bairro;?>">
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    @if ($errors->has('bairro'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bairro') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=Div que eu implementei =-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="form-group has-feedback {{ $errors->has('logradouro') ? 'has-error' : '' }}">
                    <input type="text" name="logradouro" class="form-control" value="<?php echo auth()->user()->logradouro;?>">
                    <span class="glyphicon glyphicon-road form-control-feedback"></span>
                    @if ($errors->has('logradouro'))
                        <span class="help-block">
                            <strong>{{ $errors->first('logradouro') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=Div que eu implementei =-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="form-group has-feedback {{ $errors->has('numero') ? 'has-error' : '' }}">
                    <input type="text" name="numero" class="form-control" value="<?php echo auth()->user()->numero;?>">
                    <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                    @if ($errors->has('numero'))
                        <span class="help-block">
                            <strong>{{ $errors->first('numero') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >Atualizar</button>
                
            </form>
           <div class="form-group" style="margin-top: 5px;">
                <a href="{{url ('/admin')  }}" class="btn btn-primary btn-block">Voltar</a>
            </div>
            <div class="form-group" style="margin-top: 5px;">
                <a href="{{url ('/excluir')  }}" class="btn btn-danger btn-block" onclick="return confirm('Tem certeza que deseja excluir seu cadastro?')">Excluir Conta</a>
            </div>
        </div>
         
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
@stop
