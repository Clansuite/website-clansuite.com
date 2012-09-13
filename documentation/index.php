<?php header ('Content-type: text/html; charset=utf-8');
date_default_timezone_set("Europe/Berlin");
/**
 * Returns modfication date of $file
 *
 * @file string filePath
 * @return filemtime of file or 'Documentation not created yet.'
 */
function printLastModifiedDate($file = null)
{
    # if there is no file parameter passed, we take "this" file (footer usage)
    if($file === null)
    {
        return strftime('%A, %d-%m-%Y %H:%M', filemtime(__FILE__)) . 'h';
    }
    else
    {
        $file = __DIR__ . $file;
    }

    if(is_file($file))
    {
        //Last filechanges
        echo date("l, d. M Y H:i", filemtime($file)) . 'h';
    }
    else
    {
        echo 'Documentation not created yet.';
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de" xml:lang="de">
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

        <link rel="home" href="/">
        <link rel="prefetch" href="http://forum.clansuite.com/" title="Clansuite Forums" />
        <link rel="prefetch" href="http://trac.clansuite.com/" title="Bugtracker" />
        <link rel="prerender" href="http://forum.clansuite.com/" title="Clansuite Forums" />

        <link rel="prerender" href="http://trac.clansuite.com/" title="Bugtracker" />
        <link rel="shortcut icon" href="http://clansuite.com/favicon.ico" />
        <link rel="alternate" type="application/rss+xml" href="http://groups.google.com/group/clansuite/feed/rss_v2_0_topics.xml" title="Clansuite News" />
        <link rel="stylesheet" type="text/css" href="http://cdn.clansuite.com/css/topnavigation-min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="http://cdn.clansuite.com/css/kubrick-min.css" media="all" />

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

            img
            {
                border: 0px;
            }

            .resourceheader
            {
                margin-left:    10px;
                text-align:     left;
                font-size:12px;
            }

            .td-with-image
            {
                border-right:   1px dotted #B4B4B4;
                padding-right:  10px;
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

            .res-header-icon
            {
                vertical-align: text-top;
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
                    <li><img title="Clansuite Logo" alt="Clansuite Logo 80x15" width="80" height="15" src="http://cdn.clansuite.com/banners/clansuite-80x15.png" /></li>
                    <li><a href="http://clansuite.com/">Home</a></li>
                    <li><a href="http://clansuite.com/#page-downloads">Downloads</a></li>
                    <li><a href="http://docs.clansuite.com/">Documentation</a></li>
                    <li><a href="http://forum.clansuite.com/">Forum</a></li>
                    <li><a href="http://trac.clansuite.com/">Bugtracker</a></li>
                    <li><a href="http://ci.clansuite.com/">Jenkins</a></li>
                </ul>
            </div> <!-- Headmenu End -->
            <!-- Fork me on Github Ribbon -->
            <a href="https://github.com/jakoch/Clansuite/">
                <img style="position: absolute; top: 0; left: 0; border: 0;" src="http://cdn.clansuite.com/images/fork-me-on-github.png" alt="Fork Clansuite on GitHub" />
            </a>
        </div><!-- Headbar End -->

        <div id="headline">
            <h1 style="margin-top: 40px; margin-bottom: 35px;">
                <img style="vertical-align: text-top; margin-top: -15px;" vspace="10" hspace="20" src="http://cdn.clansuite.com/images/documentation-64px.png" alt="Documentation Icon" />
                    <b>Clansuite Documentation</b>
            </h1>
        </div><!-- Headline End -->

        <div style="clear:both; display:table; margin-left: auto; margin-right: auto;">

            <!-- Left -->
            <div style="display:table-cell; width: 350px; margin-left: 2em; padding: 25px;">
                <h2>User Resources</h2>

                 <div class="cs-message">
                    <h3>Manuals</h3>
                    <table>
                        <tr>
                            <td colspan="2">
                                <table class="cs-message-content">
                                    <tr>
                                        <td class="td-with-image">
                                            <a href="http://docs.clansuite.com/user/quick-guide/de/">
                                                <img src="http://cdn.clansuite.com/images/Clansuite-Toolbar-Icon-64-quickguide.png" alt="Clansuite Quickguide" />
                                            </a>
                                        </td>
                                        <td>
                                            <div class="resourceheader">
                                                <img class="res-header-icon" src="http://cdn.clansuite.com/images/report.png" alt="Report" />
                                                    <?php if(is_file(__DIR__.'/user/quick-guide/de/index.html')) {
                                                       echo '<a href="<http://docs.clansuite.com/user/quick-guide/de/"><b>Clansuite Quick-Guide</b></a>';
                                                    } else {
                                                       echo '<b>Clansuite Quick-Guide</b>';
                                                    } ?>
                                                    <br />
                                                    <small>auto-generated by asciidoc</small>
                                                    <p>
                                                        <br />
                                                        <small>Last update: <b><br /><?php printLastModifiedDate('/user/quick-guide/de/index.html'); ?></b></small>
                                                    </p>
                                             </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <table class="cs-message-content">
                                    <tr>
                                        <td class="td-with-image">
                                            <a href="http://docs.clansuite.com/user/manual/de/">
                                                <img src="http://cdn.clansuite.com/images/Clansuite-Toolbar-Icon-64-manual.png" alt="Clansuite Manual" />
                                            </a>
                                        </td>
                                        <td>
                                            <div class="resourceheader">
                                                <img class="res-header-icon" src="http://cdn.clansuite.com/images/report_user.png" alt="Report User" />
                                                    <?php if(is_file(__DIR__.'/user/quick-guide/de/index.html')) {
                                                       echo '<a href="http://docs.clansuite.com/user/manual/de/"><b>Clansuite User-Manual</b></a>';
                                                    } else {
                                                       echo '<b>Clansuite User-Manual</b>';
                                                    } ?>
                                                    <br />
                                                    <small>auto-generated by asciidoc</small>
                                                    <p>
                                                        <br />
                                                        <small>Last update: <b><br /><?php printLastModifiedDate('/user/manual/de/index.html'); ?></b></small>
                                                    </p>

                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                 </div>
            </div>

            <!-- Right -->
            <div style="display:table-cell; width: 350px; margin-right: 2em; padding: 25px;">
                <h2>Developer Resources</h2>

                    <div class="cs-message">
                        <h3>Manual</h3>

                        <table class="cs-message-content">
                            <tr>
                                <td class="td-with-image">
                                    <a href="http://docs.clansuite.com/developer/manual/de/">
                                        <img src="http://cdn.clansuite.com/images/Clansuite-Toolbar-Icon-64-apidev.png" alt="API Dev" />
                                    </a>
                                </td>
                                <td>
                                    <div class="resourceheader">
                                        <img class="res-header-icon" src="http://cdn.clansuite.com/images/documentation-manual.png" alt="Docu" />
                                            <a href="http://docs.clansuite.com/developer/manual/de/">
                                                <b>Clansuite Developer's Manual</b>
                                            </a>
                                            <br />
                                            <small>auto-generated by asciidoc</small>
                                            <p>
                                                <br />
                                                <small>Last update: <b><br /><?php printLastModifiedDate('/developer/manual/de/index.html'); ?></b></small>
                                            </p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="cs-message">
                    <h3>API &amp; Source Documentation</h3>

                    <table>
                        <tr>
                            <td colspan="2">
                                <table class="cs-message-content">
                                    <tr>
                                        <td class="td-with-image">
                                            <a href="http://docs.clansuite.com/developer/doxygen/html/">
                                                <img src="http://cdn.clansuite.com/images/Clansuite-Toolbar-Icon-64-phpdoc.png" alt="Doxygen" />
                                            </a>
                                        </td>
                                        <td>
                                            <div class="resourceheader">
                                                <img class="res-header-icon" src="http://cdn.clansuite.com/images/documentation-classes.png" alt="Docu" />
                                                    <a href="http://docs.clansuite.com/developer/doxygen/html/">
                                                        <b>Doxygen</b>
                                                    </a>
                                                    <br />
                                                    <small>auto-generated from Source by Doxygen</small>
                                                    <p>
                                                        <br />
                                                        <small>Last update: <b><br /><?php printLastModifiedDate('/developer/doxygen/html/index.html'); ?></b></small>
                                                    </p>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div><!-- MessageBox ENDE -->
            </div><!-- Right ENDE -->
        </div><!-- Main Ende -->
    </div>

    <hr size="1" noshade="noshade" style="margin-top: 50px; width: 22%;">

    <div class="footer">
        <p>
            &copy; 2005-<?php echo date("Y"); ?> by Jens-Andr&#x00E9; Koch - Clansuite Development Team.<br />
            <strong>Last Modification of this page:</strong> <?php echo printLastModifiedDate(); ?>
        </p>
    </div>
    </body>
</html>