@extends('layouts.layout_home')

@section('content')
    <div class="column is-1"></div>

    <div class="column is-10 is-default-padding is-content-top">
        <div class="column-center">
            <div class="header-box">
                <div class="header-box-left">&nbsp;</div>
                <div class="header-box-middle">
                    <img src="{{ asset('gfx/logo.png') }}" alt="Daniel Brendel"/>

                    <div class="header-top">{!! __('app.slogan_top') !!}</div>
                    <div class="header-sub">{{ __('app.slogan_sub') }}</div>
                </div>
                <div class="header-box-right">&nbsp;</div>
            </div>

            <div class="page-title">
                <h1>{{ __('app.home_title') }}</h1>
            </div>

            <div class="page-content">
                {!! $content !!}
            </div>
        </div>
    </div>

    <div class="column is-1"></div>
@endsection
