@extends('layouts.layout_home')

@section('content')
    <div class="column is-1"></div>

    <div class="column is-10 is-default-padding is-content-top">
        <div class="column-center">
            <div class="page-title">
                <h1>{{ __('app.discord_title') }}</h1>
            </div>

            <div class="page-content">
                <p>
                    {!! __('app.discord_info', ['link' => env('LINK_DISCORD')]) !!}
                </p>

                @if (env('GAMEJAM_ENABLE'))
                    <div class="gamejam-info">
                        <strong><i class="fas fa-exclamation-circle"></i> {{ __('app.upcoming_gamejam') }}</strong> <a href="{{ env('GAMEJAM_LINK') }}">{{ env('GAMEJAM_LINK') }}</a>
                    </div>

                    <div class="gamejam-info">
                        <strong><i class="fas fa-exclamation-circle"></i> {{ __('app.gamejam_revelation') }}</strong> <a href="{{ url('/gamejam/theme') }}">{{ url('/gamejam/theme') }}</a>
                    </div>
                @endif

                <p>
                    <br/><iframe class="embed-discord-widget" src="https://discord.com/widget?id=890565508146016296&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe><br/><br/>
                </p>

                <p>
                    <a class="button is-link" href="{{ env('LINK_DISCORD') }}">{{ __('app.discord_join') }}</a>
                </p>
            </div>
        </div>
    </div>

    <div class="column is-1"></div>
@endsection
