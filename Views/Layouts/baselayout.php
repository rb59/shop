<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />

    <title><?=NAME?></title>
    <link href="<?php echo PATHI;?>/css/styles.css" rel="stylesheet" />
    <link href="<?php echo PATHI;?>/css/custom.css" rel="stylesheet" />
    <link href="<?php echo PATHI;?>/aos/dist/aos.css" rel="stylesheet" />
    <link href="<?php echo PATHI;?>/assets/alertifyjs/css/alertify.min.css" rel="stylesheet" />
    <link href="<?php echo PATHI;?>/assets/alertifyjs/css/themes/bootstrap.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="<?php echo PATHI;?>/img/cart.png" />
    <link href="<?php echo PATHI;?>/assets/fontawesome/css/all.min.css" rel="stylesheet">
    <script src="<?php echo PATHI;?>/js/feather.min.js"></script>
</head>
<body>
    <div id="layoutDefault">
        <div id="layoutDefault_content">
            <main>
                <?php include 'header.php'; ?>
                <?= $content ?>
            </main>
        </div>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>