<html>
    
    <head>
        <link rel='stylesheet' href="{{ url('css/login.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Sonia's Recipes - LOGIN </title>
        <link rel="icon" type="image/png" href="{{ url('images/IconaSito.png') }}">
    </head>

    <body>
        <main class="loginUtente">
            <section class="form_login">
                <h1> BENTORNATO! </h1>

                @if($error == 'empty_fields')
                    <span class="error"> Inserire tutti i campi </span>
                @elseif($error == 'wrong_credentials')
                    <span class="error"> Username o password errati </span>
                @endif

                <form name='login' method='post'>
                    @csrf                   

                    <div class="username"> 
                        <div> <label for='username'> Nome utente </label> </div>
                        <div> <input type='text' name='username'> </div>
                    </div>

                    <div class="password"> 
                        <div> <label for='password'> Password </label> </div>
                        <div> <input type='password' name='password' id='password'> </div>
                        <div> <input type='button' onclick='showPassword()' value="Mostra/Nascondi" class="show"> </div>
                        <script>
                            function showPassword() {
                                let input = document.getElementById('password');
                                if(input.type === "password") {
                                    input.type = "text";
                                }
                                else {
                                    input.type = "password";
                                }
                            }
                        </script>
                    </div>

                    <div class="accedi">
                        <input type='submit' id="submit" value="Accedi">
                    </div>

                </form>

                <!-- link per passare alla pagina register -->
                <div class="signup"> Non hai un account? <a href="{{ url('signup') }}"> Iscriviti </a> </div>

            </section>

        </main>

    </body>

</html>