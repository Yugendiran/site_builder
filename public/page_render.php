<?php

include "db/conn.php";

if(isset($_GET['theme'])){
    $theme = $_GET['theme'];

    $select_theme_query = "SELECT * FROM themes WHERE theme_id = $theme";
    $select_theme_result = mysqli_query($connection, $select_theme_query);
    $theme_count = mysqli_num_rows($select_theme_result);

    if($theme_count >= 1){
        while($row = mysqli_fetch_assoc($select_theme_result)){
            $db_theme_id = $row['theme_id'];
            $db_themes_name = $row['themes_name'];
            $themes_html = $row['themes_html'];
        }
    }else{
        die();
    }
}else{
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<?php
echo $themes_html;
?>
</body>
</html>