<?php header ('Content-type: text/html; charset=utf-8'); 

# Set Locale for Date Functions
setlocale (LC_TIME, "de_DE");

# init
$latest_version = '0';
# Get all xpi files, set their filesize and date into an array
foreach (glob("*.xpi") as $filename)
{
    $files[(string) $filename]['version'] = substr($filename, 19, -4);
    $files[(string) $filename]['size'] = byteConvert(filesize($filename));
    $files[(string) $filename]['date'] = strftime('%A, %d-%m-%Y %H:%M', filemtime($filename));

    if($latest_version < $files[(string) $filename]['version'])
    {
        $latest_version     = $files[(string) $filename]['version'];
        $latest_date        = $files[(string) $filename]['date'];
        $latest_size        = $files[(string) $filename]['size'];
        $latest_filename    = $filename;
    }
}

if(is_array($files))
{
    # Sort, latest version first
    asort($files, SORT_NUMERIC);
}

/**
* Author: digitaldoener AT googlemail DOT com; 18-Jan-2009 06:51 @ php.net/filesize
* Byte converting with formated number
*
* @param int $bytes bytes
* @return string
*/
function byteConvert(&$bytes)
{
    $b = (int)$bytes;
    $s = array('B', 'kB', 'MB', 'GB', 'TB');
    if($b < 0)
    {
        return "0 ".$s[0];
    }
    $con = 1024;
    $e = (int)(log($b,$con));
    return number_format($b/pow($con,$e),2,',','.').' '.$s[$e];
}

function LastModified() {
    // Last filechanges
    return strftime('%A, %d-%m-%Y %H:%M', filemtime(__FILE__));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Clansuite Documentation</title>
        <meta name="author" content="Jens-Andre Koch" />
        <meta name="copyright" content="2005 - <?php echo date("Y"); ?> Jens-Andre Koch." />
        <meta name="description" content="Clansuite - just an eSports CMS. Free Content Management System for eSport teams. Based on PHP5, Doctrine, Smarty, Ajax. Easy, comfortable, fast, flexible." />
        <meta name="keywords" content="clan cms, clansuite, free, open source, clan, cms, content management system, esport, php, mysql, xhtml, css, smarty, doctrine, jquery, shop, portal, blog, e-commerce, groupware, forums, galleries, wiki" />
        <meta name="page-type" content="Homepage, Website" />
        <meta name="robots" content="noodp" />
        <meta name="robots" content="index,follow" />
        <meta name="language" content="german, de, deutsch" />
        <meta content="no" http-equiv="imagetoolbar" />
        <meta http-equiv="content-language" content="de" />
        <link rel="prefetch" href="http://forum.clansuite.com/" title="Clansuite Forums" />
        <link rel="prefetch" href="http://trac.clansuite.com/" title="Bugtracker" />
        <link rel="shortcut icon" href="http://clansuite.com/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="http://cdn.clansuite.com/css/topnavigation.css" />
        <style type="text/css">
        <!--
            body
            {
                margin: 0;
                padding: 0;
                font-family:  verdana, tahoma, arial, geneva, helvetica, sans-serif;
                background: #d5d6d7 url("http://cdn.clansuite.com/images/kubrickbgcolor.png");
                font-size: 65%; /* Resets 1em to 10px */
                font-family: 'Lucida Grande', Verdana, Arial, Sans-Serif;
                color: #333;
                text-align: center;
            }

            .resourceeheader
            {
                margin-left:    10px;
                text-align:     left;
            }

            .footer
            {
                font-family: verdana, tahoma;
                font-size: 9px;
                /*text-align: center;*/
                /*margin: auto;*/
            }

            ul
            {
                list-style-position:    outside;
                list-style-type:        none;
            }

            .td-with-image
            {
                border-right:   1px dotted #B4B4B4;
                padding-right:  10px;
            }

            .headline
            {
                font-size: 16px;
            }

            .cs-message
            {
                background: none repeat scroll 0 0 #CDCDCD;
                border-radius: 8px 8px 8px 8px;
                padding: 5px;
                margin-top: 10px;
            }

            .cs-message-content
            {
                background: none repeat scroll 0 0 #F4F4F4;
                border: 1px solid #A7A7A7;
                border-radius: 6px 6px 6px 6px;
                padding: 10px;
                margin-top: 3px;
                margin-bottom: 2px;
                width: 336px;
                height: 100px;
            }

            .cs-message h3
            {
                margin: 5px;
                font-size: 13px;
            }

            h1, h2 {
                text-shadow: 0 1px #FFFFFF;
            }
        -->
        </style>
        <?php #require_once dirname(__DIR__) . '/ads/analyticstracking.php'; ?>
</head>
<body>
<div id="topborder">
    &nbsp;
</div>
<div id="headbar">
    <div id="headmenu">
        <ul>
            <li><img title="Clansuite Logo" alt="Clansuite Logo 80x15" width="80" heigth=15" src="http://cdn.clansuite.com/banners/clansuite-80x15.png"/></li>
            <li><a href="http://clansuite.com/">Home</a></li>
            <li><a href="http://clansuite.com/#page-downloads">Downloads</a></li>
            <li><a href="http://docs.clansuite.com/">Documentation</a></li>
            <li><a href="http://forum.clansuite.com/">Forum</a></li>            
            <li><a href="http://trac.clansuite.com/">Bugtracker</a></li>
            <li><a href="http://ci.clansuite.com/">Jenkins</a></li>
        </ul>
    </div><!-- Headmenu End -->
     <!-- Fork me on Github Ribbon -->
    <a href="https://github.com/jakoch/Clansuite-Firefox-Toolbar/">
        <img style="position: absolute; top: 0; left: 0; border: 0;" src="http://cdn.clansuite.com/images/fork-me-on-github.png" alt="Fork Clansuite on GitHub" />
    </a>
</div><!-- Headbar End -->
<center>
    <!-- Main -->
    <div style="text-align: center; width: 90%;">
        <div>
            <h1>
                <b>Clansuite Toolbar</b>
            </h1>
        </div>
        <div class="headline">
            Die Clansuite Toolbar hält dich auf dem neuesten Stand rund um das Clansuite CMS.
        </div>
        <div class="description">
            <p>
                Die Clansuite Toolbar ist eine Hilfe für jeden, der auf Informationen rund um Clansuite setzt!
                Sie ist als nützliche Hilfe ein Muss für jeden Entwickler!
            </p>
            <p>
                Die Toolbar enthält alle wichtigen und projektrelevanten Links.
                <br />
                Die Suchfunktion unterstützt die Mehrfachsuche eines Suchbegriffs auf den jeweiligen Zielseiten.
                <br />
                Für Entwickler stehen die "Developer Links" zur Verfügung.
                Sie bieten einen Schnellzugriff auf einige der Clansuite Bibliotheken und Projekt Tools.
                <br />
                So sind zum Beispiel die Dokumentationen zu Smarty, Doctrine, Trac und Asciidoc schnell zu erreichen.
            </p>
        </div>
        <!-- Left -->
        <div style="float:left; width: auto; margin-right: 2em;">
            <h2>Download</h2>
            <hr size="1" noshade="noshade" />

            <div class="cs-message">
                <h3>Clansuite Toolbar</h3>
                <table class="cs-message-content">
                <tr>
                <td>
                    <div class="resourceeheader">
                        <div style="height: 60px; padding: 10px 0pt 0pt 50px; background: transparent url(http://cdn.clansuite.com/images/toolbar-download-button-firefox.gif) no-repeat scroll 0pt 100%;">
                            <div style="font-size: 12px; height: 20px; width: 290px; padding: 20px 20px 20px 20px; background: transparent url(http://cdn.clansuite.com/images/toolbar-download-button-firefox.png) no-repeat scroll 100% 100%;">
                                <b><a href="http://toolbar.clansuite.com/<?php echo $latest_filename; ?>">Install Clansuite Toolbar v<?php echo $latest_version; ?> for Firefox 4</a></b>
                            </div>
                        </div>
                        </br>
                        <table>
                        <tr>
                        <td colspan="2" class="td-with-image">
                            <b>Clansuite Toolbar </br> Version <?php echo $latest_version; ?></b>
                        </td>
                        <td>
                            <table>
                                <tr><td style="width: 90px">Author</td><td>Jens-Andr&#x00E9; Koch</td></tr>
                                <tr><td>Version</td><td><?php echo $latest_version; ?></td></tr>
                                <tr><td>Last Update</td><td><?php echo $latest_date; ?></td></tr>                                
                                <tr><td>License</td><td>MPL 1.1 / GPL 2+ / LGPL 2.1+</td></tr>
                                <tr><td>Icon License</td><td>CCA 3.0 / PD</td></tr>
                                <tr><td>Size</td><td><?php echo $latest_size; ?></td></tr>
                                <tr><td>Compatibility</td><td>Mozilla Firefox 3.*, 4.*</td></tr>
                            </table>
                        </td>
                        </tr>
                        </table>
                    </div>
                </td>
                </tr>
                </table>
            </div>
        </div>
        <br style="clear:both;" />

        <hr size="1" noshade="noshade" style="margin-top: 50px; width: 22%;"/>
        <!-- Fusszeile -->
        <div class="footer" style="">
            <p>
                &copy; 2005-<?php echo date("Y"); ?> by Jens-Andr&#x00E9; Koch - Clansuite Development Team.<br />
                <strong>Letzte &Auml;nderung der Seite:</strong> <?php echo LastModified(); ?>
            </p>
        </div><!-- Fusszeile ENDE -->
    </div>
</center>
</body>
</html>