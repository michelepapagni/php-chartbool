<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/app.css">
        <title>ChartBool - Milestone 1</title>
    </head>
    <body>

        <div class="container">
            <?php
                include 'database.php';

                $json = json_encode($data_milestone_1);
            ?>

            <canvas id="milestone-1" data-json="<?php echo $json; ?>"></canvas>
        </div>

        <script src="js/app.js"></script>
    </body>
</html>
