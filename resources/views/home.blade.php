<html>

    <head>
        <meta charset="utf-8">
        <title> Sonia's Recipes - HOME </title>
        <link rel="stylesheet" href="{{ url('css/home.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
        <script src="{{ url('js/home.js') }}" defer="true"> </script>
        <script>
            const BASE_URL = "{{ url('/') }}";
        </script>
        <link rel="icon" type="image/png" href="{{ url('images/IconaSito.png') }}">
    </head>

    <body>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <nav>
            <div id="nome_sito"> Sonia's Recipes </div>
            <ul id="menu">
                <li> <a href="{{ url('ricettario') }}"> Ricettario di {{ $username }} </a> </li>
                <li> <a href="{{ url('profile') }}"> Profilo </a> </li>
                <li> <a id="logout" href="{{ url('logout') }}"> LOGOUT </a> </li>
            </ul>
            <div id="menu_icon" onclick="toggleMobileMenu(this)">
                <div class="bar1"> </div>
                <div class="bar2"> </div>
                <div class="bar3"> </div>
                <ul class="menu_mobile">
                    <li> <a href="{{ url('ricettario') }}"> Ricettario di {{ $username }} </a> </li>
                    <li> <a href="{{ url('profile') }}"> Profilo </a> </li>
                <li> <a id="logout" href="{{ url('logout') }}"> LOGOUT </a> </li>
                </ul>
            </div>
        </nav>

        <section id="contents">
                <!-- CARICAMENTO DINAMICO DEI CONTENUTI -->
        </section>
        
        <footer>
            Sgarrata Sonia 1000001075
        </footer>

    </body>

</html>