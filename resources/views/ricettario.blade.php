<html>
    <head>
        <meta charset="utf-8">
        <title> Sonia's Recipes - FAVORITE RECIPES </title>
        <link rel="stylesheet" href="{{ url('css/ricettario.css') }}"> 
        <script src="{{ url('js/fav_recipes.js') }}" defer="true"></script>
        <script>
            BASE_URL = "{{ url('/') }}";
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ url('images/IconaSito.png') }}">
    </head>

    <body>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <div id="preferiti">

            <h1> Ricette a cui hai messo mi piace: </h1>
                
            <div id="div_prefers">
                <!-- Visualizzazione dinamica delle ricette che un utente ha aggiunto nel ricettario -->
            </div>
            
            <a id="backHome" href="{{ url('home') }}"> Torna alla Home </a>
        </div>

        <section>
            <div id="music">
                <form id="search">
                    Ascolta un brano su Spotify mentre cucini:
                    <input type="text" id="song">
                    <input type="submit" id="submit" value="Cerca brano">
                </form>

                <div id="results">
                    <!-- Visualizzazione dei risultati della ricerca canzone -->
                </div>
            </div>
        </section>

    </body>
</html>