<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/img/favicon.ico">

    <title>Todo</title>

    <link href="<?=$this->fileCache('/css/main.css')?>" rel="stylesheet">
    <?= $this->section('css') ?>
</head>

<body>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Todo list ✓</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php
                        $links = ['/' => 'Accueil', '/projects' => 'Projects', '/contact' => 'Contact'];

                        foreach ($links as $link => $text):
                            ?>
                            <li <?=($_SERVER['REQUEST_URI'] === $link)? 'class="active"': ''?>><a href="<?=$link?>"><?=$text?></a></li>
                    <?php endforeach; ?>

<!--                    <li class="dropdown">-->
<!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li><a href="#">Accueil</a></li>-->
<!--                            <li><a href="#">Projects</a></li>-->
<!--                            <li><a href="#">Something else here</a></li>-->
<!--                            <li role="separator" class="divider"></li>-->
<!--                            <li class="dropdown-header">Nav header</li>-->
<!--                            <li><a href="#">Separated link</a></li>-->
<!--                            <li><a href="#">One more separated link</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
                </ul>
<!--                <ul class="nav navbar-nav navbar-right">-->
<!--                    <li><a href="../navbar/">Default</a></li>-->
<!--                    <li class="active"><a href="./">Static top <span class="sr-only">(current)</span></a></li>-->
<!--                    <li><a href="../navbar-fixed-top/">Fixed top</a></li>-->
<!--                </ul>-->
            </div>
        </div>
    </nav>


    <div class="container">

        <div class="starter-template">
            <?php if(isset($message)): ?>
                <div class="<?=$message[0]?>"><?=$message[1]?></div>
            <?php endif ?>

            <?= $this->section('default') ?>
        </div>

    </div>

    <?= $this->section('js') ?>
    <?=(isset($_getToolbar) AND $this->insert('toolbar', 'PrimPack'))?>
</body>
</html>