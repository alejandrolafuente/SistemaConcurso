<!DOCTYPE html>
<html>

<body>

    <?php

    $myfile = fopen("cand.txt", "r") or die("Unable to open file!");

    while (!feof($myfile)) {
        echo substr(fgets($myfile), 39, 11) . "<br>";
    }

    fclose($myfile);

    ?>

</body>

</html>