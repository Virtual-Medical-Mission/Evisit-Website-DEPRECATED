<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="E-Visit Website made by VMM">
    <meta name="keywords" content="VMM Virtual Medical Missions Evisit E-Visit e-visit Telemed Telemedicine">
    <meta name="author" content="Virtual Medical Missions">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?=$config['name']; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php foreach($config['stylesheets'] as $style): ?>
        <link rel="stylesheet" href="<?=$style; ?>">
    <?php endforeach; ?>
    <link rel="shortcut icon" href="<?=$config['logo']; ?>" type="image/png">
    <link rel="icon" href="<?=$config['logo']; ?>" type="image/png">

    <!-- Advanced style tag builder loader, directly translating styles from a PHP Object to a style tag -->

    <style>
        <?php foreach($styles as $element => $property): ?>
            <?=$element . '{'; ?>

            <?php foreach($property as $style): ?>
                <?=$style . ';' . "\r\n"; ?>
            <?php endforeach; ?>
            <?='}' . "\r\n"; ?>
        <?php endforeach; ?>
    </style>
</head>


<body>
