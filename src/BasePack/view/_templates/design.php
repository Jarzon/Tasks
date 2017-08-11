<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
		<title>Tasks</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <link href="/css/main.css" rel="stylesheet">
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
            <div id="message"><?= $this->section('default') ?></div>
        </div>

        <footer class="alignCenter clear">
            Jason Vaillancourt
        </footer>

	</body>
</html>