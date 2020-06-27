<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading a file using PHP</title>
</head>

<body>
    <?php

    /*
        Reading a file
    */

    $filename = "tmp.txt";
    $file = fopen($filename, 'r');

    if ($file == false) {
        die("Error in opening file");
    }

    $filesize = filesize($filename);
    $filetext = fread($file, $filesize);
    fclose($file);

    echo "File Size : $filesize bytes";
    echo "<pre>$filetext</pre>";
    ?>
</body>

</html>