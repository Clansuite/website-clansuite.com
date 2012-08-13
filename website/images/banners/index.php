<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Clansuite Logo's &amp; Banner's</title>
        <link rel="shortcut icon" href="http://www.clansuite.com/favicon.ico" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <style type="text/css">
            <!--
            body
            {
                font-size: 12px;
                font-family:  verdana, tahoma, arial, geneva, helvetica, sans-serif;
                background: url(http://cdn.clansuite.com/images/bg.gif) top center repeat-x #ffffff;
                color: #000000;
            }

            .resourceeheader
            {
                margin-left:    10px;
                text-align:     left;
            }

            .td-with-image
            {
                border-right:   1px ridge #0B0B0B;
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
            -->
        </style>
    </head>
    <body style="background-color:#E0E0E0;">
        <!-- Main -->
        <div style="text-align:center; width: 90%;">
            <div>
                <h1><b>Clansuite Logo's &amp; Banner's</b></h1>
                <p>Usage Informations:<br />
                    <br />
                    <b>For Users</b>: Click on Input-Area to Select the string for copy'n'paste.
                    <br />
                    <b>For Clansuite-Admins</b>: Drop new Banners via FTP into this folder. That's it.
                </p>

                <table>
                    <tbody>
                        <?php

                        class ImageFilter extends FilterIterator
                        {

                            public function accept()
                            {
                                return preg_match('@\.(gif|jpe?g|png)$@i', $this->current());
                            }

                        }
                        $counter = '0';
                        foreach(new ImageFilter(new DirectoryIterator('.')) as $imagefile)
                        {
                            # Counter
                            $counter++;
                            # Filename
                            $filename = substr($imagefile->getFilename(), 0, -4);

                            print "<tr><td colspan=2 align=left><br /><br />Banner $counter - <b>$filename</b></td></tr>\n";
                            print "<tr><td><img src='" . htmlentities($imagefile) . "'/></td>\n";
                            print "<td>\n";
                            print '<form id="embedForm' . $counter . '" name="embedForm' . $counter . '" action="">';
                            print "\n";
                            print '<input type="text" size="80" readonly="" ';
                            print 'onclick="javascript:document.embedForm' . $counter . '.embed_code.focus();document.embedForm' . $counter . '.embed_code.select();"';
                            print "\n";
                            echo ' value="<a href=\'http://clansuite.com\'><img border=0 alt=\'' . $filename . '\' src=\'http://clansuite.com/banner/' . htmlentities($imagefile) . '\' /></a>" name="embed_code" id="embed_code"/>';
                            print "</form>\n</td>\n</tr>\n";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>

        <br style="clear:both;" />

        <hr size="1" noshade="noshade" style="margin-top: 50px; width: 22%;">
            <!-- Fusszeile -->
            <div class="footer" style="">
                <?php

                function LastModified()
                {
                    //Last filechanges
                    $filemod = filemtime($_SERVER['SCRIPT_FILENAME']);
                    $filemodtime = date("r", $filemod);
                    return $filemodtime;
                }
                ?>
                <p>
                    &copy; 2005-<?php echo date("Y"); ?> by Jens-Andr&#x00E9; Koch - Clansuite Development Team.<br />
                    <strong>Letzte &Auml;nderung der Seite:</strong> <?php echo LastModified(); ?>
                </p>
            </div>
    </body>
</html>