<!doctype HTML>

<html>
    <head>
        <title>Questions -  Mady By Lu</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
    </head>
    <body>
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <h3><a href="/"><span class="glyphicon glyphicon-home" title="Home"></span></a> @yield('menu_items')  </h3>
                @if(!isset(Auth::User()->name))
                <form method="post" action="/auth/login">
                    {!! csrf_field() !!} 
                    <input type="text" name="email" placeholder="email" /> 
                    <input type="password" name="password" placeholder="password" /> 
                    <input type="submit" value="Login" />
                    <a href="/auth/register">Register</a>
                </form>
                @else
                <h3 class="logout"><a href="/auth/logout">Logout</a></h3>
                @endif
            </div>
        </nav>
        <section class="alerts container">
            @yield('alerts')
        </section>
        <section class="container">
            @yield('content')
        </section>
    </body>
</html>
