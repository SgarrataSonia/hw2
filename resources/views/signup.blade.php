<html>
    <head>
        <link rel='stylesheet' href="{{ url('css/login.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <script src="{{ url('js/signup.js') }}" defer="true"></script>
        <script>
            BASE_URL = "{{ url('/') }}";
        </script>        
        <title> Sonia's Recipes - SIGNUP </title>
        <link rel="icon" type="image/png" href="{{ url('images/IconaSito.png') }}">
    </head>

    <body>
        <main class="registraUtente">
            <section class="form_registra">
                <h1> REGISTRATI: </h1>
                
                <form name='registra' method='post' autocomplete="off">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    
                    <div class="names"> 

                        <div class="nome"> 
                            <div> <label for='nome'> Nome </label> </div>
                            <div> <input type='text' name='nome' value='{{ old("nome") }}'> </div>
                            <span> </span>
                        </div>

                        <div class="cognome"> 
                            <div> <label for='cognome'> Cognome </label> </div>
                            <div> <input type='text' name='cognome' value='{{ old("cognome") }}'> </div>
                            <span> </span>
                        </div>

                    </div>
                    
                    <div class="username"> 
                        <div> <label for='username'> Nome utente </label> </div>
                        <div> <input type='text' name='username' value='{{ old("username") }}'> </div>
                        <div id="dimMax"> Max 16 caratteri </div>
                        <span> </span>
                    </div>

                    <div class="email"> 
                        <div> <label for='email'> Email </label> </div>
                        <div> <input type='text' name='email' value='{{ old("email") }}'> </div>
                        <span> </span>
                    </div>

                    <div class="password"> 
                        <div> <label for='password'> Password </label> </div>
                        <div> <input type='text' name='password'> </div>
                        <div id="dimMax"> Min 8 caratteri </div>
                        <span> </span>
                    </div>

                    <div class="conferma_psw"> 
                        <div> <label for='conf_psw'> Conferma password </label> </div>
                        <div> <input type='text' name='conf_psw'> </div>
                        <span> </span>
                    </div>

                    <div class="registrati">
                        <input type='submit' id="submit" value="Registrati">
                    </div>

                </form>

                <!-- link per passare alla pagina login -->
                <div class="registrer">  Hai già un account? <a href="{{ url('login') }}"> Accedi </a> </div>

            </section>
        </main>
    </body>
</html>