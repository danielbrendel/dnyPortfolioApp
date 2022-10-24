@extends('layouts.layout_home')

@section('content')
    <div class="column is-1"></div>

    <div class="column is-10 is-default-padding is-content-top">
        <div class="column-center">
            <div class="header-box">
                <div class="header-box-left">&nbsp;</div>
                <div class="header-box-middle">
                    <img src="{{ asset('gfx/logos/acr.png') }}" alt="ac-resources.org"/>

                    <div class="header-top">{!! __('app.acr_top') !!}</div>
                    <div class="header-sub">{!! __('app.acr_sub') !!}</div>
                </div>
                <div class="header-box-right">&nbsp;</div>
            </div>

            <div class="page-title">
                <h1>{{ __('app.acr_title') }}</h1>
            </div>

            <div class="page-content">
                <div class="link">
                    <a href="https://www.ac-resources.org/">https://www.ac-resources.org/</a>
                </div>

                {!! $content !!}
            </div>
        </div>
    </div>

    <div class="column is-1"></div>
@endsection
