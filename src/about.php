<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lionel Sellam | Front End Developer</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href='//fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css" />
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <a href="index.php" id="logo">
        <h1>Lionel Sellam</h1>
        <h2>Front End Developer</h2>
    </a>
    <nav>
        <ul>
            <li><a href="index.php">Portfolio</a></li>
            <li><a href="about.php"class="selected">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
</header>
<div id="wrapper">
    <section>
        <div class="about">
            <img src="img/lionel.jpg" alt="Epic Kitesurf photo" class="profile-photo">
            <div class="wrapAbout">
                <h3>About</h3>
                <p> Hello everyone and welcome! This website is here showcase what I'm capable of web wise, but also to let you know I'm available for your projects you might have<br>
                    Not only do I love Web, I'm also a passionate Kitesurfer, Mountain Biker,and Drummer. But overall a hardcore PC gamer.<br><br>
                    If you'd like to follow me on twitter, my username is <a href="http://twitter.com/icbreaker">@ICBreaker</a>
                </p>
            </div>
        </div>
    </section>
    <section>
        <h3 class="latestBadges">Here are my latest badges on Treehouse:</h3>
            <div class="badgesTreehouse">

            </div>
    </section>
    <footer>
        <a href="http://twitter.com/icbreaker"><img src="img/twitter-wrap.png" alt="Twitter Logo" class="social-icon"></a>
        <a href="http://facebook.com/lionel.cestlame"><img src="img/facebook-wrap.png" alt="Facebook Logo" class="social-icon"></a>
        <p>&copy; 2015 Lionel Sellam.</p>
    </footer>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/profileTreehouse.js"></script>
<script src="js/animateBadges.js"></script>
<script src="//code.highcharts.com/highcharts.js"></script>
<script src="//code.highcharts.com/modules/exporting.js"></script>
<div id="container" style="min-width: 310px; height: 500px; max-width: 600px; margin: 0 auto"></div>
</body>
</html>
