<?php
include "db/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>

        <!-- Google Fonts -->
        <!-- Livvic -->
        <link href="https://fonts.googleapis.com/css2?family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="css/style.css" />
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
            <!-- <div class="icon"></div> -->
            <h1>Step 1 / 2: Choose Site Name</h1>
            <div class="progress_bar">
                <div class="fill" style="width: 50%"></div>
            </div>
        </section>
        <section class="container">
            <h1>Enter Website name</h1>
            <form action="template.php" method="get">
                <div class="form_group">
                    <input name="site_name" type="text" placeholder="Your Website Name" />
                </div>
                <button type="submit" class="btn">Next</button>
            </form>
        </section>
    </body>
</html>
