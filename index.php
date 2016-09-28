<?php

require_once 'enterDb.php';
require_once 'imageController.php';

use \database\enterDB as DB;
use \controller\imageController as Logic;

$control = new Logic();
$dbObj   = new DB();
$db1     = $dbObj->connect();

if (!empty($_FILES['image']['name']) && isset($_POST['upload'])) {
    $res = '';
    $res = $control->uploadImage($_FILES);
    if(!empty($res)) echo $res;

} elseif (empty($_FILES['image']['name']) && isset($_POST['upload'])) {
    echo "<h2> Please, choose file for uploading!</h2>";
}

if (isset($_POST['delete'])) $control->deleteImage($_POST['imageId']);
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

            <?php
            $images = $db1->query("SELECT * FROM `images`")->fetchAll();

            foreach ($images as $image) {
                    echo '<div id="img_div">';
                    echo '<img src ="uploadedImages/' . $image['file_name'] . '">';
                    echo '<p> Name: ' . $image['file_name'] . '</p>';
                    echo '<p> Size: ' . $image['size'] . '</p>';
                    echo '<p> Date and Time: ' . $image['date'] . '</p>';

                    echo '<form  action="index.php" method="post" enctype="multipart/form-data">';

                    echo '<p><input name="imageId" type="hidden" value="'. $image['id'] .'"></p>';
                    echo '<p><input name="delete"  type="submit" value="Delete"></p>';
                    echo '<a href="uploadedImages/' . $image['file_name'] . '" download>Download</a>';
                    echo '</form>';
                    echo '</div>';
            }
            ?>
        </div>
    </body>
</html>


