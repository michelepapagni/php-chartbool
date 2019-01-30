<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/app.css">
        <title>ChartBool - Milestone 1</title>
    </head>
    <body>

        <div class="container">
            <?php /* ?>
            <h1>Milestone 1</h1>
            <canvas id="milestone-1"></canvas>
            <h1>Milestone 2</h1>
            <canvas id="milestone-2-line"></canvas>
            <canvas id="milestone-2-pie"></canvas>
            */ ?>

            <?php include 'database.php';
            include 'functions.php';
             ?>

            <h1>Milestone 3</h1>
            <?php
                $chartAccess = $database['fatturato']['access'];
                $userAccess = $_GET['access'];
            ?>
            <?php if (checkAccess($userAccess, $chartAccess)) { ?>
                <canvas id="simple-line"></canvas>
            <?php } ?>

            <?php
                $chartAccess = $database['fatturato_by_agent']['access'];
            ?>
            <?php if (checkAccess($userAccess, $chartAccess)) { ?>
                <canvas id="pie"></canvas>
            <?php } ?>

            <?php
                $chartAccess = $database['team_efficiency']['access'];
            ?>
            <?php if (checkAccess($userAccess, $chartAccess)) { ?>
                <canvas id="multi-line"></canvas>
            <?php } ?>
        </div>

        <script src="js/app.js"></script>
    </body>
</html>
