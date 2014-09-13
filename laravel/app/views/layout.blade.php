<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>English Vocabulary</title>
        {{ HTML::style('vendor/foundation-5.4.0/css/foundation.min.css'); }}
        {{ HTML::style('vendor/semantic/packaged/css/semantic.min.css'); }}
        {{ HTML::style('css/app.css'); }}

        {{ HTML::script('vendor/foundation-5.4.0/js/vendor/modernizr.js'); }}
    </head>
    <body>

    @section('navigation')
    <!-- Navigation bar -->
    <div class="contain-to-grid">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
            <li class="name">
                <h1><a href="#" style="cursor: default;">English Vocabulary</a></h1>
            </li>
            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
            <ul class="left"> <!-- Left Nav Section -->
                <li><a href="{{ URL::to('profile') }}">Profil</a></li>
                <li class="has-dropdown">
                    <a href="{{ URL::to('learn') }}">Lernen</a>
                    <ul class="dropdown">
                        <li><a href="{{ URL::to('learn/list') }}">Liste</a></li>
                        <li><a href="{{ URL::to('learn/train') }}">Trainieren</a></li>
                        <li><a href="{{ URL::to('learn/practice') }}">Üben</a></li>
                        <li><a href="{{ URL::to('learn/test') }}">Probetest</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="right"> <!-- Right Nav Section -->
                <li><a href="{{ URL::to('login') }}">Login</a></li>
            </ul>


        </section>
    </nav>
    </div>
    @show

    @section('content')


    @show

    {{ HTML::script('vendor/foundation-5.4.0/js/vendor/jquery.js'); }}
    {{ HTML::script('vendor/foundation-5.4.0/js/foundation.min.js'); }}
    <script>
        $(document).foundation();
    </script>
    </body>

</html>