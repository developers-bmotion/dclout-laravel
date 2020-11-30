@component('mail::message')
# {{ __("email.bievenido_email_a") }} {{ config('app.name') }}.
¡{{ __('email.hola') }} {{ $name }}!
{{--    {{ __("Sr/Sra :artist hemos recibidos tus datos. ", ['artist' => $artist]) }}--}}
{{--    Ten encuenta que puedes iniciar sesión e ingresar a tu perfil a traves de este link usando las credenciales de acceso (correo eléctronico y contreseña) que usaste al crear tu cuenta.--}}
{{--    @component('mail::button', ['url' => route('login')])--}}
{{--        {{ __('Iniciar Sesión') }}--}}
{{--    @endcomponent--}}


{{ __('email.gracias') }},<br>
{{ config('app.name') }}
@endcomponent
