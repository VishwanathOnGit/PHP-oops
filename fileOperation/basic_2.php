<?php
  /*
        Writing a file
    */

$filename = "writeIn.txt";
$file = fopen($filename, 'w');

if ($file == false) {
    echo ("Error in opening new file");
    exit();
}
fwrite($file, "This is  a simple test\n");
fclose($file);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Writing a file using PHP</title>
</head>

<body>
    <?php

    /*
        Reading a file
    */

    $filename = "writeIn.txt";
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