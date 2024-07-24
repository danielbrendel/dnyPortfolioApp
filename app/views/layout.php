<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <title>Daniel Brendel | Indie Software Developer & Project Founder</title>

        <link rel="stylesheet" type="text/css" href="https://unpkg.com/98.css"/>

        <link rel="icon" type="image/png" href="img/logo.png"/>

        <script src="{{ asset('js/fontawesome.js') }}"></script>
    </head>

    <body>
        <div class="content">
            {%content%}
        </div>
		<script src="{{ asset('js/app.js') }}"></script>
        <script>
            window.maxProjects = 7;
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
        </script>
    </body>
</html>