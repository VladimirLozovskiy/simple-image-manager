<?php

require_once 'enterDb.php';

use \database\enterDB as DB;


$dbObj   = new DB();
$db1     = $dbObj->connect();

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <div id="forma">
            <form action="index.php" method="post" enctype="multipart/form-data">
                <div>
                    <input name="image" accept="image/gif, image/jpeg, image/png" type="file">
                </div>
                <div>
                    <input name="upload" value="Upload" type="submit">
                </div>
            </form>
            <h2>List of file's which have been uploaded:</h2>

    </body>
</html>


