<?php

if ($_FILES)
{
    $fname = "/tmp/".uniqid().".pdf";
    system('gs -q -dNOPAUSE -dBATCH -sDEVICE=pdfwrite -sOutputFile='.$fname.' -c .setpdfwrite -f '.$_FILES['pdf-file']['tmp_name']);
    header('Content-Disposition: attachment; filename="'.$_FILES['pdf-file']['name'].'"');
    $fp = fopen($fname, 'rb');
    fpassthru($fp);
    fclose($fp);
    exit;
}

?>
<html>
    <head>
        <title>PDF File unlocker</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body>
        Unlocking of the PDF File.
        <form enctype="multipart/form-data" action="./" method="POST"/>
            <input type="hidden" name="MAX_FILE_SIZE" value="20971520"/>
            PDF file: <input name="pdf-file" type="file"/>
            <br/><input type="submit" value="Send File"/>
        </form>
    </body>
</html>

