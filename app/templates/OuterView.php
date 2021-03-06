<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
    <title>message board</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="/css/style.css">
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/css/layouts/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="/css/layouts/side-menu.css">
    <!--<![endif]-->
</head>
<body>
<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu">
            <a class="pure-menu-heading" href="#">MessageBoard</a>

            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="/" class="pure-menu-link">Home</a></li>
                <li class="pure-menu-item"><a href="#form" class="pure-menu-link">Form</a></li>
                <li class="pure-menu-item"><a href="#voices" class="pure-menu-link">Voices</a></li>
            </ul>
        </div>
    </div>
    <div id="main"><?php echo $this->getContentView()->getContent()?></div>
</div>
<script src="/js/ui.js"></script>
</body>
</html>
