@extends('layouts.layout_home')

@section('content')
    <div class="column is-1"></div>

    <div class="column is-10 is-default-padding is-content-top">
        <div class="column-center">
            <div class="header-box">
                <div class="header-box-left is-bg-bar">&nbsp;</div>
                <div class="header-box-middle">
                    <img src="{{ asset('gfx/logos/danigram.png') }}" alt="Danigram"/>

                    <div class="header-top">{!! __('app.danigram_top') !!}</div>
                    <div class="header-sub">{!! __('app.danigram_sub') !!}</div>
                </div>
                <div class="header-box-right">&nbsp;</div>
            </div>

            <div class="page-title">
                <h1>{{ __('app.danigram_title') }}</h1>
            </div>

            <div class="page-content">
                {!! $content !!}
            </div>
        </div>
    </div>

    <div class="column is-1"></div>
@endsection
