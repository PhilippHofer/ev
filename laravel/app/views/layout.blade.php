<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <title>English Vocabulary</title>
        {{ HTML::style('vendor/foundation-5.4.0/css/foundation.min.css'); }}
        {{ HTML::style('vendor/semantic/packaged/css/semantic.min.css'); }}

        {{ HTML::script('vendor/foundation-5.4.0/js/vendor/jquery.js'); }}
        {{ HTML::script('vendor/foundation-5.4.0/js/foundation.min.js'); }}

    </head>
    <body>

    @section('navigation')
    <!-- Navigation bar -->
    <div class="contain-to-grid">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
            <li class="name">
                <h1><a href="#">Lernen</a></h1>
            </li>
            <li class="toggle-topbar menu-icon">
                <a href="#"><span>Menu</span></a>
            </li>
        </ul>

        <section class="top-bar-section">
            <ul class="left"> <!-- Left Nav Section -->
                <li><a href="#">Profil</a></li>
            </ul>

            <ul class="right">  <!-- Right Nav Section -->
                <li>
                    <a href="#">Right Button Active</a>
                </li>
            </ul>

        </section>
    </nav>
    </div>
    @show

    @section('content')
    <div class="row">
        <div class="small-12 small-centered column">
            <div class="panel">
                <h3>Login</h3>
                <form class="ui form segment">
                    <div class="field">
                        <label for="username">Name</label>
                        <div class="ui left icon input">
                            <input type="text" placeholder="Vorname Nachname">
                            <i class="user icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <label for="password">Passwort</label>
                        <div class="ui left icon input">
                            <input type="password" placeholder="">
                            <i class="lock icon"></i>
                        </div>
                    </div>
                    <br><br>

                    <input type="submit" class="ui blue submit button" value="Login"/>
                </form>
            </div>
        </div>
    </div>

    @show
    </body>

</html>