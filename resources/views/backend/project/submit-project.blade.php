@extends('backend.layout')

@section('header')
    <x-header>
        <x-slot name="title">
            <h1 class="tx-normal" style="padding-top: 10rem">{{ __('Presenta_Proyecto') }}</h1>
        </x-slot>
        Lorem ipsum dolor si amet, an dus situ sint pertinacia constituto, mir dignsius
    </x-header>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-9 col-12">
            <submit-project></submit-project>
        </div>
    </div>

@endsection
@push('js')
    <script>
    </script>
@endpush
