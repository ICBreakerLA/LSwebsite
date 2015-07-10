<?php
if(isset($_POST['envoi'])){
    if(isset($_POST['field-nom']) && $_POST['field-nom'] != null && $_POST['field-nom'] != '' && isset($_POST['field-mail'])  && $_POST['field-mail'] != null && $_POST['field-mail'] != '' && isset($_POST['field-mess'])  && $_POST['field-mess'] != null && $_POST['field-mess'] != ''){
        function verifMail($email) {
            if((preg_match('/^([a-zA-Z0-9]+(([\.\-\_]?[a-zA-Z0-9]+)+)?)\@(([a-zA-Z0-9]+[\.\-\_])+[a-zA-Z]{2,4})$/',$email))){
                $host = explode('@', $email);
                if(checkdnsrr($host[1].'.', 'MX')) return true;
                if(checkdnsrr($host[1].'.', 'A')) return true;
                if(checkdnsrr($host[1].'.', 'CNAME')) return true;
            }
            return false;
        }
        $envoyer=true;
        $reponse="";
        $nom=$_POST['field-nom'];
        $nomSansHTML=strip_tags($_POST['field-nom']);
        //$tel='';
        //if(isset($_POST['field-tel']))
            //$tel=strip_tags($_POST['field-tel']);
        $email=$_POST['field-mail'];
        $message=$_POST['field-mess'];
        $messageSansHTML=strip_tags($_POST['field-mess']);
        $messageSansSPAM=str_replace("[url]", "", $messageSansHTML);
        $messageSansSPAM=str_replace("http", "", $messageSansSPAM);
        $messageSansSPAM=str_replace("viagra", "", $messageSansSPAM);
        $to="lionbrfr@lionel-sellam.io";
        $subject="[lionel-sellam.io] Message";
        $headers  = 'MIME-Version: 1.0'."\r\n";
        $headers .= 'Content-Type: text/plain; charset="UTF-8"'."\r\n";
        $headers .= 'Reply-To: '.strtoupper($nomSansHTML).' <'.strtolower($email).'>'."\r\n";
        $headers .= 'From: '.strtoupper($nomSansHTML).' <'.strtolower($email).'>'."\r\n";
        $headers .= 'X-Mailer: PHP/'.phpversion();
        if(verifMail($email)==false){
            $reponse='<span class="error">Error: non-valid email.</span>';
            $envoyer=false;
        }
        if($message!=$messageSansSPAM){
            $reponse='<span class="error">Error: Email considered as spam</span>';
            $envoyer=false;
        }
        if($envoyer==true){
            //$messageSansSPAM=$messageSansSPAM."\r\n"."\r\n";
            //$messageSansSPAM=$messageSansSPAM."Tél. : ".$tel;
            if(mail($to, $subject, $messageSansSPAM, $headers)){
                $reponse='<span class="success">Your email has been sent, thank you.</span>';
                unset($_POST);
            }
            else $reponse='<span class="error">Error : email failed to be sent. Please try again.</span>';
        }
    }
    else $reponse='<span class="error">Error : Required fields missing.</span>';
}
else $reponse='* Required fields';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lionel Sellam | Front End Developer</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href='http://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet' type='text/css'>
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
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php" class="selected">Contact</a></li>
        </ul>
    </nav>
</header>
<div id="wrapper">
    <section class="general_info">
        <h3>General Information</h3>
        <p>I am available for ripping shit up. If you have any questions, please don't hesitate to contact me!</p>
        <p>Please only use twitter and email to reach me.</p>
    </section>
    <!-- <section id="secondary">
        <h3>Contact Details</h3>
        <ul class="contact-info">
            <li class="phone"><a href="tel:962-6987">962-6987</a></li>
            <li class="mail"><a href="mailto:lionel.sellam@gmail.com">lionel.sellam@gmail.com</a></li>
            <li class="twitter"><a href="https://twitter.com/icbreaker">@ICBreaker</a></li>
        </ul>
    </section> -->
    <section>
        <div id="form-main">
            <div id="form-div">
                <form class="form" id="form1" method="post" action="contact.php">

                    <p class="name">
                        <input class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Name*" type="text" id="field-nom" name="field-nom" value="<?php if(isset($_POST['field-nom'])) echo $_POST['field-nom'];?>" tabindex="25" />
                    </p>

                    <p class="email">
                        <input placeholder="Email*" type="text" class="validate[required,custom[email]] feedback-input" id="field-mail" name="field-mail" value="<?php if(isset($_POST['field-mail'])) echo $_POST['field-mail'];?>" tabindex="26" />
                    </p>

                    <p class="text">
                        <textarea class="validate[required,length[6,300]] feedback-input" placeholder="Comment*" id="field-mess" name="field-mess" tabindex="28"><?php if(isset($_POST['field-mess'])) echo $_POST['field-mess'];?></textarea>
                    </p>


                    <div class="submit">
                        <input type="submit" value="SEND" id="button-blue"/>
                        <input type="hidden" name="envoi" value="true" />
                        <div class="ease"></div>
                    </div>

                    <p class="required">
                        <?php echo $reponse; ?>
                    </p>
                </form>
            </div>
    </section>
    <footer>
        <a href="http://twitter.com/icbreaker"><img src="img/twitter-wrap.png" alt="Twitter Logo" class="social-icon"></a>
        <a href="http://facebook.com/lionel.cestlame"><img src="img/facebook-wrap.png" alt="Facebook Logo" class="social-icon"></a>
        <p>&copy; 2015 Lionel Sellam.</p>
    </footer>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
</body>
</html>
