@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@php( $password_email_url = View::getSection('password_email_url') ?? config('adminlte.password_email_url', 'password/email') )

@if (config('adminlte.use_route_url', false))
    @php( $password_email_url = $password_email_url ? route($password_email_url) : '' )
@else
    @php( $password_email_url = $password_email_url ? url($password_email_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.password_reset_message'))

@section('auth_body')

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ $password_email_url }}" method="post">
        {{ csrf_field() }}

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>
            
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{-- Send reset link button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-share-square"></span>
            {{ __('adminlte::adminlte.send_password_reset_link') }}

            
        </button>
        {{-- return button --}}
        <a href="{{ route('login') }}">Voltar</a>
    </form>

@stop

@section('css')
     
<style>
   body{ 
       background-image: url('../img/fundo3.jpg') !important;
    
   }

   input{
    display: block !important;
    height: 45px !important;
    width: 400px !important;
    margin: 10px !important;
    border-radius: 30px !important;
    border: 1px solid white !important;
    font-size: 16px !important;
    padding: 10px 20px !important;
    background-color: rgba(255,255,255, 0.01) !important;
    color: white !important;
    outline: none !important;

}

a{
    color: white !important;
    text-decoration: none !important;
    display: block !important;
    text-align: center !important;
    
}

a:hover{
    text-decoration: underline !important;
    color:crimson !important;
}

button{ 
    display: block !important;
    height: 45px !important;
    border-radius: 30px !important;
    border: 1px solid white !important;
    font-size: 16px !important;
    padding: 10px 20px !important;
    background-color: rgba(255,255,255, 0.01) !important;
    color: white !important;
    outline: none !important;

}

button:hover{
    text-decoration: underline !important;
    background-color:crimson !important;
}

::placeholder{
        color: white !important;
}
</style>

@endsection

