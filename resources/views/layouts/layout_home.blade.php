<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('app.website_title') }}</title>

	<link rel="icon" type="image/png" href="{{ asset('gfx/logo.png') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bulma.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item navbar-item-brand is-font-ink-free" href="{{ url('/') }}">
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
                            <a class="navbar-item" href="{{ url('/products/astarlove') }}">
                                Astarlove
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="{{ url('/products/cdg') }}">
                                Casual Desktop Game
                            </a>
                            <a class="navbar-item" href="{{ url('/products/cge') }}">
                                Casual Game Engine
                            </a>
                            <a class="navbar-item" href="{{ url('/products/cpw') }}">
                                Casual Pixel Warrior
                            </a>
                            <a class="navbar-item" href="{{ url('/products/blackspace') }}">
                                Black Space
                            </a>
                            <a class="navbar-item" href="{{ url('/products/solitarius') }}">
                                Solitarius
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="{{ url('/products/corvuschat') }}">
                                CorvusChat
                            </a>
                            <a class="navbar-item" href="{{ url('/products/ufw') }}">
                                UniFont Writer
                            </a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{ __('app.services') }}
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ url('/services/geekflash') }}">
                                geekflash.net
                            </a>
                            <a class="navbar-item" href="{{ url('/services/lachanfall') }}">
                                lachanfall.co
                            </a>
                            <a class="navbar-item" href="{{ url('/services/astarlove') }}">
                                astarlove.com
                            </a>
                            <a class="navbar-item" href="{{ url('/services/gamingpals') }}">
                                gamingpals.org
                            </a>
                            <a class="navbar-item" href="{{ url('/services/helprealm') }}">
                                helprealm.io
                            </a>
                            <a class="navbar-item" href="{{ url('/services/webframeworkdb') }}">
                                webframeworkdb.com
                            </a>
                            <a class="navbar-item" href="{{ url('/services/mittelalterevents') }}">
                                mittelalter-events.net
                            </a>
                            <a class="navbar-item" href="{{ url('/services/gamedevscreens') }}">
                                gamedevscreens.com
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

        @if ((isset($header_banner)) && ($header_banner == true))
        <div class="banner" style="background-image: url('{{ asset('gfx/banner.jpg') }}')">
            <div class="banner-overlay">
                <div class="columns">
                    <div class="column is-2"></div>

                    <div class="column is-8">
                        <div class="banner-content">
                            <div class="banner-content-headline">
                                <div class="is-inline-block home-banner-image">
                                    <img src="{{ asset('gfx/logo.png') }}" alt="Daniel Brendel">
                                </div>

                                <div class="is-inline-block home-banner-text">
                                    {{ __('app.home_welcometext') }}
                                </div>
                            </div>

                            <div class="banner-content-subline">{{ __('app.home_sublinetext') }}</div>

                            <div class="banner-content-products">
                                <div class="preview-chevron"><i class="fas fa-chevron-left fa-10x is-pointer" onclick="window.productsNavGoLeft();"></i></div>

                                @foreach (app('config')->get('previews') as $key => $item)
                                    <div class="preview-item is-hidden" id="preview-item-{{ $key }}" onmouseover="document.getElementById('preview-item-hover-{{ $key }}').classList.remove('is-hidden');" onmouseout="document.getElementById('preview-item-hover-{{ $key }}').classList.add('is-hidden');">
                                        <div class="preview-item-hover is-pointer is-hidden" id="preview-item-hover-{{ $key }}" onclick="location.href = '{{ url($item['route']) }}';">
                                            <div class="preview-item-hover-text">{{ $item['text'] }}</div>
                                        </div>
                                        
                                        <img src="{{ asset('gfx/screens/' . $item['img']) }}" alt="preview-image"/>
                                    </div>
                                @endforeach

                                <div class="preview-chevron"><i class="fas fa-chevron-right fa-10x is-pointer" onclick="window.productsNavGoRight();"></i></div>
                            </div>

                            <div class="banner-content-products-nav">
                                @for ($i = 0; $i < count(app('config')->get('previews')); $i++)
                                    <span class="is-pointer" id="products-nav-{{ $i }}" onclick="window.selectProductsEntry({{ $i }});"><i id="products-nav-icon-{{ $i }}" class="far fa-circle"></i></span>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="column is-2"></div>
                </div>
            </div>
        </div>
        @endif

        <div class="container">
            <a name="content"></a>
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

        window.productsCount = {{ count(app('config')->get('previews')) }};
        window.productsIndex = 0;
        window.selectProductsEntry = function(index) {
            window.productsIndex = index;

            for (i = 0; i < window.productsCount; i++) {
                if (i !== index) {
                    document.getElementById('preview-item-' + i).classList.add('is-hidden');
                    document.getElementById('products-nav-icon-' + i).classList.add('far')
                    document.getElementById('products-nav-icon-' + i).classList.remove('fas');
                } else {
                    document.getElementById('preview-item-' + i).classList.remove('is-hidden');
                    document.getElementById('products-nav-icon-' + i).classList.remove('far');
                    document.getElementById('products-nav-icon-' + i).classList.add('fas');
                }
            }
            
            window.fadeIn(document.getElementById('preview-item-' + index).children[0]);
        };

        window.fadeIn = function(elem) {
            elem.style.opacity = '0';

            var fade = function() {
                let newVal = parseFloat(elem.style.opacity) + 0.1;
                elem.style.opacity = newVal;
                if (newVal < 1.0) {
                    setTimeout(fade, 100);
                }
            }

            fade();
        };

        window.productsNavGoRight = function() {
            window.productsIndex++;
            if (window.productsIndex >= window.productsCount) {
                window.productsIndex = 0;
            }

            window.selectProductsEntry(window.productsIndex);
        };

        window.productsNavGoLeft = function() {
            window.productsIndex--;
            if (window.productsIndex < 0) {
                window.productsIndex = window.productsCount - 1;
            }

            window.selectProductsEntry(window.productsIndex);
        };

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

            selectProductsEntry(0);

            window.nonIndex = ['/imprint', '/news', '/tech', '/services/', '/products/'];
            let url = '{{ Request::url() }}';
            for (let i = 0; i < window.nonIndex.length; i++) {
                if (url.indexOf(window.nonIndex[i]) !== -1) {
                    location.href = '{{ Request::url() }}#content';
                    break;
                }
            }
        });
    </script>
</body>
</html>
