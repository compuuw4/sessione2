<?php
$servicesJson = json_decode(file_get_contents('./services.json'), true);  //load json file
$serviceId = isset($_GET['id']) ? $_GET['id'] : null;  //if article Id is set/ if exist
$selectedId = null; // if it is without value/empty 
foreach ($servicesJson['services'] as $service) {    // loop foreach  with condition if article id is identical to articleID(null) in this way assign an id to the empty variable
    if ((string)$service['id'] === (string)$serviceId) {
        $selectedId = $service;
        break;
    }
}

if ($selectedId !== null) {
    // Now $selectedArticle contains selected article data
    $pageTitle = $selectedId['title']; // This is where $selectedArticle['title'] is setup
} else {
    // to check for errors in case no article is founded
    $pageTitle = "Article Not Found";
}

$selectedService = null;

if ($serviceId !== null) {
    foreach ($servicesJson['services'] as $service) {
        if ((string)$service['id'] === (string)$serviceId) {
            $selectedService = $service;
            break;
        }
    }
}

if ($selectedService === null) {
    echo "Service not found.";
    exit; // Redirect or display an error message
}
$headTitle = $pageTitle;
$headDescription = "Full stack web developer.
Greetings! I'm Dobri Dobrev , a passionate and innovative web developer
with a knack for turning ideas into digital reality. 
Let me take you on a journey through my professional story.";

require("head.php");
require("main.php");
?>


<section class="page-section">

    <div class="page-container">
        <div class="grid-page">
            <article class="article">


                <img src="<?= $selectedService['imageUrl']; ?>" alt="<?= $selectedService["title"] ?>" class="article__image">

                <?php foreach ($selectedService['sections'] as $section) : ?>
                    <h2 class="service-heading"><?= $section['heading'] ?></h2>
                    <p class="paragraph"><?= $section['content'] ?></p>
                <?php endforeach; ?>
            </article>
            <!-- Sidebar -->
            <aside class="right-sidebar">

                
                <!--Peach Style Search widget -->
                <div class="widget widget--peach-color">
                    <input type="search" class="widget__search" placeholder="Search...">
                </div>

                <!--Peach Style Widget categories -->
                <div class="widget widget--peach-color">
                    <h3 class="fourth-heading">Categories</h3>

                    <div class="widget__categories">
                        <ul class="widget__categories-list">
                            <li class="widget__categories-items">
                                <a href="#" class="widget__categories-link" aria-label="Business Consulting">Business Consulting</a>
                            </li>
                            <li class="widget__categories-items">
                                <a href="#" class="widget__categories-link" aria-label="Marketing">Marketing</a>
                            </li>
                            <li class="widget__categories-items">
                                <a href="#" class="widget__categories-link" aria-label="SEO Optimization">SEO Optimization</a>
                            </li>
                            <li class="widget__categories-items">
                                <a href="#" class="widget__categories-link" aria-label="Designing">Designing</a>
                            </li>
                            <li class="widget__categories-items">
                                <a href="#" class="widget__categories-link" aria-label="Facebook Marketing">Facebook Marketing</a>
                            </li>
                            <li class="widget__categories-items">
                                <a href="#" class="widget__categories-link" aria-label="Web Development">Web Development</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Peach Style Widget keyword tags -->
                <div class="widget widget--peach-color">
                    <h3 class="fourth-heading">Keywords</h3>

                    <div class="widget__tag">
                        <ul class="widget__tag-list">
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Front end">Front end</a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Back end">Back end</a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="E-commerce">E-commerce</a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Maintenance">Maintenance</a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Design">Design</a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Support">Support</a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Web apps">Web apps </a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Cms">Cms </a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Web development">Web development </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Footer -->

    <?php
    require("footer.php");
    ?>
