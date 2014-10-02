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
    $l_om = "Om";
    $l_kontakt = "Kontakt";
    $l_kode = "Kode";
} else {
    $l_hjem = "Home";
    $l_om = "About";
    $l_kontakt = "Contact";
    $l_kode = "Code";
}
?>

<div class="container">
    <div class="header">
        <ul class="nav nav-pills pull-right">
            <li class="active"><a href="index.html"><?php echo $l_hjem; ?></a></li>
            <li><a href="http://www.robbestad.com"><?php echo $l_om; ?></a></li>
            <li><a href="mailto:anders@robbestad.com"><?php echo $l_kontakt; ?></a></li>
        </ul>
        <h3 class="text-muted" id="content">Headline</h3>
    </div>

    <div class="jumbotron">

        <?php if (@$details->country === "NO") { ?>

        <?php } else { ?>
            <p>This demo shows you whether your browser supports the new <em>picture</em>-element, and will show
                you either a <strong>SMALL</strong>, <strong>MEDIUM</strong> or <strong>HIRES</strong> version
                of Rembrandt's self portrait (image is released through a Creative Commons license).</p>
      <?php } ?>
    </div>

    <div class="row marketing">
        <div class="col-md-6 col-xs-12">
        <img src="img/s1x.png" srcset="s2x.png 480w, s3x.png 640w, s4x.png 1000w" alt="Fun game">
<!--
            <picture>
                <source media="(min-width: 45em)" srcset="img/large.jpg">
                <source media="(min-width: 32em)" srcset="img/med.jpg">
                <img src="img/small.jpg" alt="Rembrandt" class="img img-responsive">
            </picture>
 -->
         </div>
        <div class="col-md-6 col-xs-12">
<pre><?php echo $l_kode; ?>:
source...
</pre>
        </div>
    </div>

    <div id="footer">

        Copyright &copy; <?php echo date("Y"); ?> - Sven Anders Robbestad - License: CC - Source: <a href="https://github.com/svenanders/inbeta-picture-element">github.com</a>
    </div>

</div>
<!-- /div.container -->

</body>
<!-- Contains jQuery, React and compiled js (included jsx) -->
<script type="text/javascript" src="./js/libs.min.js"></script>
<script type="text/javascript" src="./js/app.js"></script>
