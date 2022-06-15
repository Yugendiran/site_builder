<?php

include "db/conn.php";

if(isset($_GET['template']) && isset($_GET['site_name'])){
  $template_name = $_GET['template'];
  $site_name = $_GET['site_name'];

  $select_theme_query = "SELECT * FROM themes WHERE theme_id = $template_name";
  $select_theme_result = mysqli_query($connection, $select_theme_query);
  $theme_count = mysqli_num_rows($select_theme_result);

  if($theme_count >= 1){
    while($row = mysqli_fetch_assoc($select_theme_result)){
        $db_theme_id = $row['theme_id'];
        $db_themes_name = $row['themes_name'];
        $themes_html = $row['themes_html'];
    }
  }else{
    header("location: index.php");
  }
}else{
  header("location: index.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Page Builder</title>
    <script src="js/lib/grapes.min.js"></script>
    <link rel="stylesheet" href="css/lib/grapes.min.css" />

    <!-- Add Style and Script for Preset Webpage Builder -->
    <script src="js/lib/grapesjs-preset-webpage.min.js"></script>
    <link rel="stylesheet" href="css/lib/grapesjs-preset-webpage.min.css" />
    
    <!-- Plugins -->
    <script src="js/lib/grapesjs-tabs.min.js"></script>
    <script src="js/lib/grapesjs-lory-slider.min.js"></script>
    <script src="js/lib/grapesjs-blocks-flexbox.min.js"></script>
    <script src="js/lib/grapesjs-custom-code.min.js"></script>
    <script src="js/lib/grapesjs-tooltip.min.js"></script>
    <script src="js/lib/grapesjs-typed.min.js"></script>
    <script src="js/lib/grapesjs-tui-image-editor.min.js"></script>

    <!-- Modules -->
    <script src="../dist/grapesjs-blocks-bootstrap4.min.js"></script>

    <!-- Add-on -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>

    <div id="gjs" style="overflow:hidden">
    <?php
echo $themes_html;
    ?>
      <style>

      </style>
    </div>


    <script src="js/main.js"></script>
  </body>
</html>
