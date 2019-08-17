@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificar Seu E-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um link de verificação foi enviado para o seu E-mail.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar verifique sua caixa de entrada para verificar.') }}
                    {{ __('Se você não recebeu o email') }}, <a href="{{ route('verification.resend') }}">{{ __('clique aqui para re-enviar') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
