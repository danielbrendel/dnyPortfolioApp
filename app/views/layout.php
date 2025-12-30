<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <meta name="author" content="{{ env('APP_AUTHOR') }}">
        <meta name="description" content="{{ env('APP_DESCRIPTION') }}">

        <meta name="og:title" property="og:title" content="{{ (isset($_meta_title)) ? $_meta_title : env('APP_AUTHOR') }}">
        <meta name="og:description" property="og:description" content="{{ (isset($_meta_description)) ? $_meta_description : env('APP_DESCRIPTION') }}">
        <meta name="og:url" property="og:url" content="{{ (isset($_meta_url)) ? $_meta_url : url('/') }}">
        <meta name="og:image" property="og:image" content="{{ (isset($_meta_image)) ? asset('img/uploads/' . $_meta_image) : asset('img/logo.png') }}">

        <title>{{ env('APP_TITLE') }}</title>

        @if (env('APP_ENABLE_PWA'))
        <link rel="manifest" href="{{ asset('manifest.json') }}"/>
        @endif

        <link rel="stylesheet" type="text/css" href="{{ asset('css/98.min.css') }}"/>

        <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}"/>

        <script src="{{ asset('js/fontawesome.js') }}"></script>
        <script src="{{ asset('js/app.js', true) }}"></script>
    </head>

    <body>
        @include('widgets.php')

        <div class="content">
            {%content%}
        </div>

        @include('menu.php')
        @include('taskbar.php')
		
        <script>
            @if (env('APP_ENABLE_PWA'))
            window.onload = function() {
                if ('serviceWorker' in navigator) {
                    navigator.serviceWorker.register('./serviceworker.js', { scope: '/' })
                        .then(function(registration){
                            window.serviceWorkerEnabled = true;
                        }).catch(function(err){
                            window.serviceWorkerEnabled = false;
                            console.error(err);
                        });
                }
            };
            @endif

            window.initDesktop = function() {
                window.setDesktopStyle('max-width', '100px');

                window.registerWidget('column-window-about', 'About', 'about.png');
                @if (env('APP_ENABLE_BLOG'))
                window.registerWidget('column-window-blog', 'Blog Posts', 'blog.png');
                @endif
                window.registerWidget('column-window-projects', 'Projects', 'projects.png');
                window.registerWidget('column-window-technologies', 'Tech Stack', 'tech.png');
                @if (env('APP_ENABLE_SHOUTBOX'))
                window.registerWidget('column-window-shoutbox', 'Shoutbox', 'shoutbox.png');
                @endif
                @if (env('APP_ENABLE_TERMINAL'))
                window.registerWidget('column-window-terminal', 'Terminal', 'terminal.png');
                document.getElementById('terminal-code-result').innerHTML += 'Browser terminal started' + "<br/>" + navigator.userAgent + "<br/>" + 'Current time: ' + (new Date()).toLocaleString() + "<br/><br/>";
                @endif

                window.openWidget('#column-window-about');

                window.addStartMenuItem('Contact', 'mail.png', function() { window.location.href = 'mailto:{{ env('APP_CONTACT') }}'; });
                window.addStartMenuDelimiter();
                @foreach (config('socials') as $social)
					@if ((is_string($social->url)) && (strlen($social->url) > 0))
                        window.addStartMenuItem('{{ $social->name }}', '{{ $social->icon }}', function() { window.open('{{ $social->url }}'); });
					@endif
				@endforeach
            };

            window.maxProjects = {{ (isset($projects) ? count($projects) : 0) }};
            
            document.addEventListener('DOMContentLoaded', function() {
                window.initDesktop();

                window.switchProjectTab(1);

                window.fetchBlogPosts('#blog-posts');
                window.fetchBlogPosts('#popular-posts', 'popular');
                window.fetchBlogPosts('#random-posts', 'random');
                window.updateDateTime('#update-current-time');

                window.hljs.registerLanguage('aquashell', function() {
					return {
						case_insensitive: false,
						keywords: {
							keyword: 'global const set if function elseif else for while local result unset call class method member construct destruct require exec run cwd gwd getscriptpath getscriptname debug textview random sleep bitop timestamp fmtdatetime gettickcount getsystemerror setsystemerror threadfunc hideconsole listlibs print sys pause exit quit',
							literal: 'bool int float string void true false __ALL__',
						},
						contains: [
						{
							className: 'string',
							begin: '"',
							end: '"'
						},
						hljs.COMMENT(
							'#',
							"\n",
							{}
						)
						]
					}
				});
				window.hljs.highlightAll();

                @if (env('APP_ENABLE_SHOUTBOX'))
                window.shoutboxInterval = setInterval(() => {
                    window.queryShout('.sunken-panel-shoutbox');
                }, {{ env('APP_SHOUTBOX_DELAY', 5000) }});
                @endif
            });
        </script>
    </body>
</html>