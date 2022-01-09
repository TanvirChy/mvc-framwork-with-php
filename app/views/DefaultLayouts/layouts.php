<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $this->siteTitle(); ?> | MVC Framework</title>

    <link href="<?= css('main') ?>" rel="stylesheet" type="text/css" />
    <!-- <link href="http://localhost/ownMvc/css/main.css" rel="stylesheet" type="text/css" /> -->
    <?= $this->content('head'); ?>

</head>

<body>

    <?= $this->content('body'); ?>


    <?= $this->content('script'); ?>
</body>



</html>