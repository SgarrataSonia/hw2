<html>

    <head>
        <meta charset="utf-8">
        <title> Sonia's Recipes - PROFILE </title>
        <link rel="stylesheet" href="<?php echo e(url('css/profile.css')); ?>">
        <script src="<?php echo e(url('js/profile.js')); ?>" defer="true"> </script>
        <script>
            BASE_URL = "<?php echo e(url('/')); ?>";
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="<?php echo e(url('images/IconaSito.png')); ?>">
    </head>

    <body>
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

        <section class="credentials">
            <h1> Benvenuto sul tuo profilo! </h1>

                <!-- Visualizzazione info utente -->
                <section class='mod'>

                    <span> </span>

                    <p> Nome: <?php echo e($nome); ?> <button id='mod_nome'> Modifica </button> <form method='post' id='nome'> </form> </p>
                    <p> Cognome: <?php echo e($cognome); ?> <button id='mod_cognome'> Modifica </button> <form method='post' id='cognome'> </form> </p>
                    <p> Username: <?php echo e($username); ?> <button id='mod_username'> Modifica </button> <form method='post' id='username'> </form> </p>
                    <p> Email: <?php echo e($email); ?> <button id='mod_email'> Modifica </button> <form method='post' id='email'> </form> </p>
                    <p> Password: <button id='mod_psw'> Modifica password </button> <form method='post' id='password'> </form> </p>
                </section>        

            <section class="buttonContainer">
                <a id="backHome" href="<?php echo e(url('home')); ?>"> Torna alla Home </a>
            </section>
        </section>
    </body>

</html><?php /**PATH C:\xampp\htdocs\hw2\resources\views/profile.blade.php ENDPATH**/ ?>