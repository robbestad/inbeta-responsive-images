<!DOCTYPE html>
<head>
    <meta http-equiv='Content-type' content='text/html; charset=utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Picture Element Demo</title>
    <link href="css/style.min.css" type="text/css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php
function getUserIP()
{
    if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') > 0) {
            $addr = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    } else {
        return @$_SERVER['REMOTE_ADDR'];
    }
}

$ip = getUserIP();
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
//echo "{$details->city}, {$details->country}";
echo "<!--";
var_dump($details);
echo "-->";

if (@$details->country === "NO") {
    $l_hjem = "Hjem";
    $l_om = "Blog";
    $l_kontakt = "Kontakt";
    $l_kode = "Kode";
} else {
    $l_hjem = "Home";
    $l_om = "Blog";
    $l_kontakt = "Contact";
    $l_kode = "Code";
}
 $l_hjem = "Home";
    $l_om = "Blog";
    $l_kontakt = "Contact";
    $l_kode = "Code";
?>

<div class="container-fluid">
    <div class="header">
        <ul class="nav nav-pills pull-right">
           <!--  <li class="active"><a href="index.html"><?php echo $l_hjem; ?></a></li> -->
            <li><a href="http://www.robbestad.com"><?php echo $l_om; ?></a></li>
            <li><a href="mailto:anders@robbestad.com"><?php echo $l_kontakt; ?></a></li>
        <li><a href="http://www.inmeta.no"><img src="img/inmeta.svg" width="100" ></a></li>
        </ul>
        <h3 class="text-muted" id="content">Headline</h3>
    </div>


    <div class="row marketing">
    <div class="col-xs-12 ">
    This demo compares the result of using <em>
    <a href="http://caniuse.com/#search=srcset">&lt;srcset&gt;</a></em> or
    <p><em><a href="http://caniuse.com/#search=picture">&lt;picture&gt;</a></em> for responsive images. You need a cutting
    edge browser (like <a href="http://www.google.com/intl/no/chrome/browser/canary.html">
    Chrome Canary</a>) for this to work.
</p><p>
This demo loads a 320x480 image with different resolutions depending on your viewport.
This is an improvement on simply scaling the images responsively with media queries,
because instead of downloading a single image that is scaled up and down, now the
browser is only downloading the appropriate image. This leads to a smaller footprint
for mobile devices, resulting in shorter download times and faster web pages.
</p>
    </div>

        <div class="col-xs-6 ">
        <h3>srcset</h3>
        <img class="img img-responsive"
           width="320" height="480" src="img/s1x.png"
           srcset="img/s2x.png 480vw, img/s3x.png 640vw, img/s4x.png 1000vw"
           alt="Fun game">


         </div>
         <div class="col-xs-6 ">
        <h3>picture</h3>
            <picture>
                <source media="(min-width: 1000px)" srcset="img/p4x.png">
                <source media="(min-width: 640px)" srcset="img/p3x.png">
                <source media="(min-width: 480px)" srcset="img/p2x.png">
                <img src="img/p1x.png"  width="320" height="480" alt="Fun Game"
                   class="img img-responsive">
            </picture>

         </div>

    </div>

    <div id="footer">

        Copyright &copy; <?php echo date("Y"); ?> - Sven Anders Robbestad - License: CC <!-- - Source: <a href="https://github.com/svenanders/inbeta-picture-element">github.com</a> -->
    </div>

</div>
<!-- /div.container -->

</body>
<!-- Contains jQuery, React and compiled js (included jsx) -->
<script type="text/javascript" src="./js/libs.min.js"></script>
<script type="text/javascript" src="./js/app.js"></script>
