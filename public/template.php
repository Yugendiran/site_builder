<?php
include "db/conn.php";

if(isset($_GET['site_name'])){
    $site_name = $_GET['site_name'];
}else{
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Template</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Google Fonts -->
        <!-- Livvic -->
        <link href="https://fonts.googleapis.com/css2?family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="css/style.css" />

        <style>
            .container .btn{
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>
    <body>
        <nav>
            <div class="left">
                <div class="icon">
                    <img src="img/Golspoh_logo_circle.png" alt="Golspoh" />
                </div>
                <h1>Site Builder</h1>
            </div>
            <div class="right">
                <div class="icon"></div>
            </div>
        </nav>
        <section class="top_bar">
            <a href="index.php"><div class="icon">
                <i class="fa-solid fa-angle-left"></i>
            </div></a>
            <h1>Step 2 / 2: Choose Site Template</h1>
            <div class="progress_bar">
                <div class="fill" style="width: 50%"></div>
            </div>
        </section>
        <section class="container">
            <h1>Choose Template</h1>
            <a href="builder.php"><div class="btn">Custom</div></a>
            
            <div class="item_contain">
<?php
$select_all_template_query = "SELECT * FROM themes";
$select_all_template_result = mysqli_query($connection, $select_all_template_query);
while($row = mysqli_fetch_assoc($select_all_template_result)){
    $theme_id = $row['theme_id'];
    $themes_name = $row['themes_name'];
?>
                <div class="item" style="background-image: url(img/categories/ecommerce.jpg)">
                    <h1><?php echo $themes_name; ?></h1>
                    <div class="hov_icon" onclick="openFrame('<?php echo $theme_id; ?>', '<?php echo $site_name; ?>')">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div class="fill"></div>
                </div>
<?php
}
?>
            </div>
        </section>

        <div class="site_holder" id="site_loader">
            <div class="site_contain">
                <iframe id="page_render_container" height="100%" width="100%" title="Iframe Example"></iframe>
            </div>
            <a id="buildBtn"><div class="btn">Build</div></a>
        </div>

        <script src="js/script.js"></script>
    </body>
</html>
