@extends('errors::illustrated-layout')

@section('code', '419')
@section('title', __('La sesión expiró'))

@section('image')
<div style="background-image: url({{ asset('/svg/403.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Lo sentimos, su sesión expiró. Por favor vuelva a ingresar al sistema.'))
