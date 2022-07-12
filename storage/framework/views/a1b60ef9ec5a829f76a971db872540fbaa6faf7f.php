<html>

    <head>
        <meta charset="utf-8">
        <title> Sonia's Recipes - HOME </title>
        <link rel="stylesheet" href="<?php echo e(url('css/home.css')); ?>">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
        <script src="<?php echo e(url('js/home.js')); ?>" defer="true"> </script>
        <script>
            const BASE_URL = "<?php echo e(url('/')); ?>";
        </script>
        <link rel="icon" type="image/png" href="<?php echo e(url('images/IconaSito.png')); ?>">
    </head>

    <body>
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>

        <nav>
            <div id="nome_sito"> Sonia's Recipes </div>
            <ul id="menu">
                <li> <a href="<?php echo e(url('ricettario')); ?>"> Ricettario di <?php echo e($username); ?> </a> </li>
                <li> <a href="<?php echo e(url('profile')); ?>"> Profilo </a> </li>
                <li> <a id="logout" href="<?php echo e(url('logout')); ?>"> LOGOUT </a> </li>
            </ul>
            <div id="menu_icon" onclick="toggleMobileMenu(this)">
                <div class="bar1"> </div>
                <div class="bar2"> </div>
                <div class="bar3"> </div>
                <ul class="menu_mobile">
                    <li> <a href="<?php echo e(url('ricettario')); ?>"> Ricettario di <?php echo e($username); ?> </a> </li>
                    <li> <a href="<?php echo e(url('profile')); ?>"> Profilo </a> </li>
                <li> <a id="logout" href="<?php echo e(url('logout')); ?>"> LOGOUT </a> </li>
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

</html><?php /**PATH C:\xampp\htdocs\hw2\resources\views/home.blade.php ENDPATH**/ ?>