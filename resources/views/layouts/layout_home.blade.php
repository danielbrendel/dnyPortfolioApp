<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('app.website_title') }}</title>

	<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bulma.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">
        <div class="banner" style="background-image: url('{{ asset('gfx/banner.png') }}')">
            <div class="banner-content">
                <div>
                    <div class="is-inline-block home-banner-image">
                        <img src="{{ asset('gfx/me.png') }}" alt="Daniel Brendel">
                    </div>

                    <div class="is-inline-block home-banner-text">
                        {{ __('app.home_welcometext') }}
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar is-success" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item navbar-item-brand" href="{{ url('/') }}">
                    {{ __('app.website_title') }}
                </a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="{{ url('/') }}">
                        {{ __('app.home') }}
                    </a>

                    @if (env('TWITTER_HANDLE') !== null)
                    <a class="navbar-item" href="{{ url('/news') }}">
                        {{ __('app.news') }}
                    </a>
                    @endif

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{ __('app.products') }}
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ url('/products/asatruphp') }}">
                                Asatru PHP
                            </a>
                            <a class="navbar-item" href="{{ url('/products/dnys') }}">
                                dnyScript
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="{{ url('/products/danigram') }}">
                                Danigram
                            </a>
                            <a class="navbar-item" href="{{ url('/products/actifisys') }}">
                                Actifisys
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="{{ url('/products/cdg') }}">
                                Casual Desktop Game
                            </a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{ __('app.services') }}
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ url('/services/lachanfall') }}">
                                lachanfall.co
                            </a>
                            <a class="navbar-item" href="{{ url('/services/gamingpals') }}">
                                gamingpals.org
                            </a>
                            <a class="navbar-item" href="{{ url('/services/helprealm') }}">
                                HelpRealm
                            </a>
                        </div>
                    </div>

                    <a class="navbar-item" href="{{ url('/tech') }}">
                        {{ __('app.tech') }}
                    </a>

                    @if (env('HELPREALM_WORKSPACE') !== null)
                    <a class="navbar-item" href="https://helprealm.io/{{ env('HELPREALM_WORKSPACE') }}" target="_blank">
                        {{ __('app.contact') }}
                    </a>
                    @endif

                    <a class="navbar-item" href="{{ url('/imprint') }}">
                        {{ __('app.imprint') }}
                    </a>
                </div>

                <div class="navbar-end">
                    <a class="navbar-item" href="javascript:void(0);" onclick="window.setLangCookie('de'); location.reload();">
                        <img src="{{ asset('gfx/flags/german.png') }}" alt="German"/>
                        <span class="mobile-only">{{ __('app.change_german') }}</span>
                    </a>

                    <a class="navbar-item" href="javascript:void(0);" onclick="window.setLangCookie('en'); location.reload();">
                        <img src="{{ asset('gfx/flags/english.png') }}" alt="English"/>
                        <span class="mobile-only">{{ __('app.change_english') }}</span>
                    </a>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="columns">
                @yield('content')
            </div>
        </div>

        <div class="cookie-consent-outer">
            <div id="cookie-consent" class="cookie-consent-inner">
                <div class="cookie-consent-text">
                    {{ __('app.cookie_consent') }}
                </div>

                <div class="cookie-consent-button">
                    <button type="button" onclick="window.clickedCookieConsentButton();">{{ __('app.ok') }}</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.handleCookieConsent = function() {
            var cookies = document.cookie.split(';');
            var foundCookie = false;
            for (i = 0; i < cookies.length; i++) {
                if (cookies[i].indexOf('cookieconsent') !== -1) {
                    foundCookie = true;
                    break;
                }
            }

            if (foundCookie === false) {
                document.getElementById('cookie-consent').style.display = 'inline-block';
            }
        }

        window.hasLangCookie = function() {
            var cookies = document.cookie.split(';');
            for (i = 0; i < cookies.length; i++) {
                if (cookies[i].indexOf('lang') !== -1) {
                    return true;
                }
            }

            return false;
        }

        window.clickedCookieConsentButton = function() {
            var curDate = new Date(Date.now() + 1000 * 60 * 60 * 24 * 365);
            document.cookie = 'cookieconsent=1; expires=' + curDate.toUTCString() + ';';

            document.getElementById('cookie-consent').style.display = 'none';
        }

        window.initialLangCookie = function() {
            if (!window.hasLangCookie()) {
                var curDate = new Date(Date.now() + 1000 * 60 * 60 * 24 * 365);
                document.cookie = 'lang=en; expires=' + curDate.toUTCString() + ';';
            }
        }

        window.setLangCookie = function(lang) {
            var curDate = new Date(Date.now() + 1000 * 60 * 60 * 24 * 365);
            document.cookie = 'lang=' + lang + '; expires=' + curDate.toUTCString() + ';';
        }

        document.addEventListener('DOMContentLoaded', () => {

            // Get all "navbar-burger" elements
            const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

            // Check if there are any navbar burgers
            if ($navbarBurgers.length > 0) {

                // Add a click event on each of them
                $navbarBurgers.forEach( el => {
                    el.addEventListener('click', () => {

                        // Get the target from the "data-target" attribute
                        const target = el.dataset.target;
                        const $target = document.getElementById(target);

                        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                        el.classList.toggle('is-active');
                        $target.classList.toggle('is-active');

                    });
                });
            }

            window.handleCookieConsent();
            window.initialLangCookie();
        });
    </script>
</body>
</html>
