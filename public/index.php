<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Site</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <style>
        body {
            margin: 0;
            background-color: lightblue;
        }
        

        .notification {
            cursor: pointer;
            text-align: center;
        }

        table {
            text-align: center;
        }

        .columns.events {
            margin-right: 10px;
            margin-left: 10px;
            margin-top: 50px;
        }

        #eventCadForm {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .editE {
            margin-right: 10px;
        }

        table thead tr {
            background-color: rgb(63, 64, 64);
        }
        table thead tr th h2 strong{
            color: white;
            font-size: larger;
        }
        
    </style>
    <link rel="stylesheet" href="css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
    <script src="https://kit.fontawesome.com/7928671f8b.js" crossorigin="anonymous"></script>
    <?php include 'js/appJS.php' ?>
</head>
<body>
    <?php include 'generalPHP/header.php' ?>
    <?php include 'generalPHP/body.php' ?>
</body>
</html>