<!DOCTYPE html>
<?php session_start();
  $header = "Tyler's Grocery Delivery";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <meta name="description" content=<?php echo $description; ?>>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel='shortcut icon' href='images/favicon.jpg' />

    </head>
    <body><header>
            <?php echo '<h1>'.$header.'</h1>'; ?>
        </header>