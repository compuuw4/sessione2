<?php
$navigationJson = json_decode(file_get_contents('./navigation.json'), true); // load navigation menu from json file
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $headDescription ?>">  <!-- i set a variable to set different description for each page (Seo purpose)  -->
    <link rel="stylesheet" href="./sass/style.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Rubik:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="icon" href="./img/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title><?= $headTitle ?></title> <!-- i set a variable to set different title for each page (Seo purpose)  -->
</head>

<body>
    <!-- Default header with navigation for all pages including hamburger menu on 900px -->
    <header class="primary-header">
        <div class="navigation  flex-system space-between flex-ver-center  sticky">
            <a href="#"><img src="./img/logo.png" alt="logo" class="mylogo"></a>
            <input type="checkbox" class="navigation__checkbox" id="hamburger-menu">
            <label for="hamburger-menu" class="navigation__button">
                <span class="navigation__icon">&nbsp;</span>
            </label>
                <!--  Nice background color effect when opening hamburger menu -->
            <div class="navigation__background">&nbsp;</div>
            <nav class="navigation__main-nav ">
                <ul class="navigation__list">
                    <!-- foreach loop for dynamic navigation   -->
                    <?php foreach ($navigationJson['navigation'] as $menu) : ?>
                        <li class="navigation__item"><a href="<?= $menu['url']; ?>" class="navigation__link" aria-label="menu items"><?= $menu['name']; ?></a></li>
                    <?php endforeach; ?>

                </ul>
            </nav>
        </div>
    </header>


    <main>