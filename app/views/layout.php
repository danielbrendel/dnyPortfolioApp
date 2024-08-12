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
        <meta name="og:image" property="og:image" content="{{ asset('img/logo.png') }}">

        <title>Daniel Brendel | Indie Software Developer & Project Founder</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/98.min.css') }}"/>

        <link rel="icon" type="image/png" href="img/logo.png"/>

        <script src="{{ asset('js/fontawesome.js') }}"></script>
    </head>

    <body>
        <div class="content">
            {%content%}
        </div>
		<script src="{{ asset('js/app.js') }}"></script>
        <script>
            window.maxProjects = {{ (isset($projects) ? count($projects) : 0) }};
            window.switchProjectTab = function(which) {
                for (let i = 1; i <= window.maxProjects; i++) {
                    let elHide = document.getElementById('tab-project-' + i);
                    if (elHide) {
                        if (!elHide.classList.contains('is-hidden')) {
                            elHide.classList.add('is-hidden');
                        }
                    }

                    let roleHide = document.getElementById('role-project-' + i);
                    if (roleHide) {
                        roleHide.ariaSelected = false;
                    }
                }

                let targetTab = document.getElementById('tab-project-' + which);
                if (targetTab) {
                    if (targetTab.classList.contains('is-hidden')) {
                        targetTab.classList.remove('is-hidden');
                    }
                }

                let targetRole = document.getElementById('role-project-' + which);
                if (targetRole) {
                    targetRole.ariaSelected = true;
                }
            };

            window.toggleWindowSize = function(wnd, style) {
                let elem = document.querySelector(wnd);
                if (elem) {
                    elem.classList.toggle(style);
                }
            };

            window.ajaxRequest = function (method, url, data = {}, successfunc = function(data){}, finalfunc = function(){}, config = {})
            {
                let func = window.axios.get;
                if (method == 'post') {
                    func = window.axios.post;
                } else if (method == 'patch') {
                    func = window.axios.patch;
                } else if (method == 'delete') {
                    func = window.axios.delete;
                }

                func(url, data, config)
                    .then(function(response){
                        successfunc(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .finally(function(){
                            finalfunc();
                        }
                    );
            };

            window.updateDateTime = function(target) {
                let elem = document.querySelector(target);
                if (elem) {
                    let dt = new Date();
                    elem.innerText = ('0' + dt.getHours()).slice(-2) + ':' + ('0' + dt.getMinutes()).slice(-2) + ':' + ('0' + dt.getSeconds()).slice(-2);

                    setTimeout(function() {
                        window.updateDateTime(target);
                    }, 1000);
                }
            }

            window.fetchBlogPosts = function(target) {
                let elem = document.querySelector(target);
                if (elem) {
                    window.ajaxRequest('get', '{{ url('/blog/posts/fetch') }}?limit=' + elem.dataset.limit, {}, function(response) {
                        if (response.code == 200) {
                            elem.innerHTML = '';

                            response.data.forEach(function(post, index) {
                                let tableEntry = `
                                    <tr>
                                        <td><a href="` + window.location.origin + '/blog/' + post.slug + `">` + post.title + `</a></td>
                                        <td>` + post.created_at + `</td>
                                    </tr>
                                `;

                                elem.innerHTML += tableEntry;
                            });
                        }
                    });
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                window.switchProjectTab(1);

                window.fetchBlogPosts('#blog-posts');
                window.updateDateTime('#update-current-time');
            });
        </script>
    </body>
</html>