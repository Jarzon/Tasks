<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
		<title>Tasks</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">

		<?php if(ENV == 'prod') { ?>
			<?php/*Google analystic*/?>
		<?php } ?>

		<?php /*TODO: Add a if to use the non minified file when in dev env to be able to debug*/?>
        <link href="/css/style.min.css" rel="stylesheet">
        <link href="/css/jquery-ui.min.css" rel="stylesheet">
	</head>
	<body>

        <nav>
            <ul id="menu">
                <li class="menu_gauche"><a href="/">Accueil</a></li>
                <li class="menu_gauche"><a href="/projects">Projects</a></li>

                <li class="menu_droite"><a href="deconnection">Deconnexion</a></li>
            </ul>
        </nav>

        <div id="corp">
            <div id="message"><?php require "{$this->root}src/$packDirectory/view/$view.php"; ?></div>
        </div>

        <footer class="alignCenter clear">
            Jason Vaillancourt
        </footer>

	</body>
</html>