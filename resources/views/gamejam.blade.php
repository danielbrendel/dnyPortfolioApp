<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Indie Game Dev Beginners #{{ $issue }}</title>

        <link rel="icon" type="image/png" href="{{ asset('gfx/logo.png') }}">

        <style>
            html, body {
                width: 100%;
                height: 100%;
                margin: 0 auto;
                font-family: 'Verdana', sans-serif;
            }

            .main {
                width: 100%;
                height: 100%;
                background-repeat: no-repeat;
                background-size: cover;
                background-image: url('{{ asset('gfx/gamejam.jpg') }}');
            }

            .overlay {
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.65);
            }

            .inner {
                position: relative;
                width: 330px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
            }

            @media screen and (min-width: 540px) {
                .inner {
                    width: 355px;
                }
            }

            .title {
                font-size: 1.3em;
                color: rgb(255, 255, 255);
            }

            .status {
                margin-top: 20px;
                font-size: 1.0em;
                color: rgb(200, 200, 200);
            }

            .theme {
                position: relative;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: rgba(50, 50, 48, 0.9);
                padding: 20px;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .reveal {
                color: rgb(0, 205, 0);
                text-transform: uppercase;
            }

            .action {
                margin-top: 40px;
                margin-bottom: 32px;
            }

            .button {
                border: 1px solid rgb(65, 163, 235);
                border-radius: 5px;
                background-color: rgb(51, 125, 185);
                color: rgb(220, 220, 220);
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 40px;
                padding-right: 40px;
                text-decoration: none;
            }

            .button:hover {
                color: rgb(255, 255, 255);
                text-decoration: none;
            }

            .links {
                margin-top: 20px;
            }

            .link {
                margin-top: 5px;
            }

            .link a {
                color: rgb(153, 220, 234);
                text-decoration: none;
            }

            .link a:hover {
                color: rgb(153, 220, 234);
                text-decoration: underline;
            }
        </style>
    </head>

    <body>
        <div class="main">
            <div class="overlay">
                <div class="inner">
                    <div class="title">Indie Game Dev Beginners #{{ $issue }}</div>

                    <div class="status">
                        @if ($diff->invert === 1)
                            <div class="theme">Theme: &gt;&gt; <span class="reveal">{{ $theme }}</span> &lt;&lt;</div>
                        @else
                            <div class="theme">Revealing in: {{ $diff->days }} days, {{ $diff->h }} hours and {{ $diff->i }} minutes</div>
                        @endif
                    </div>

                    @if ($diff->invert === 0)
                    <div class="action">
                        <a class="button" href="javascript:void(0);" onclick="location.reload();">Refresh</a>
                    </div>
                    @endif

                    <div class="links">
                        <div class="link"><a href="{{ env('GAMEJAM_LINK') }}">Join @ itch.io</a></div>
                        <div class="link"><a href="{{ url('/') }}">Powered by {{ env('APP_AUTHOR') }}</a></div>
                    </div>
                </div>
            </div>
        </div>

        @if ($diff->invert === 0)
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                setInterval(() => {
                    location.reload();
                }, 1000 * 60);
            });
        </script>
        @endif
    </body>
</html>