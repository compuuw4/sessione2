<?php
$articleJson = json_decode(file_get_contents('./articles.json'), true);  //load json file
$articleId = isset($_GET['id']) ? $_GET['id'] : null;  //if article Id is set/ if exist
$selectedId = null; // if it is without value/empty 
foreach ($articleJson['articles'] as $article) {    // loop foreach  with condition if article id is identical to articleID(null) in this way assign an id to the empty variable
    if ((string)$article['id'] === (string)$articleId) {
        $selectedId = $article;
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


/* To find the article from the list that is stored in my json file  by Id 
with conditions to check the Id of article if is found and if is null
*/

$selectedArticle = null;

if ($articleId !== null) {
    foreach ($articleJson['articles'] as $article) {
        if ((string)$article['id'] === (string)$articleId) {
            $selectedArticle = $article;
            break;
        }
    }
}

if ($selectedArticle === null) {
    echo "Article not found.";
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

            <!-- For now this part is only for the articles because i need of dynamic data
                for the name of the article the date and the author -->

                <div class="breadcrumb">
                    <div class="breadcrumb__heading">
                        <h2 class="fourth-heading"><?= $selectedArticle['title'] ?></h2>
                    </div>
                    <div>
                        <p class="paragraph"><i>Published on <?= $article['publishedDate'] ?></i></p>
                    </div>

                    <div>
                        <p class="paragraph"><i>Author: <?= $article['author'] ?></i></p>
                    </div>

                </div>
                <img src="<?= $selectedArticle['imageUrl'] ?>" alt="Article Image" class="article__image">

                <?php foreach ($selectedArticle['sections'] as $section) : ?>
                    <h2 class="article-heading"><?= $section['heading'] ?></h2>
                    <p class="paragraph"><?= $section['content'] ?></p>
                <?php endforeach; ?>
            </article>
            <!-- Sidebar -->
            <aside class="right-sidebar">

                
                <!-- Default Search widget -->
                <div class="widget">
                    <input type="search" class="widget__search" placeholder="Search...">
                </div>

                <!--Default Widget categories -->
                <div class="widget">
                    <h3 class="fourth-heading">Categories</h3>

                    <div class="widget__categories">
                        <ul class="widget__categories-list">
                            <li class="widget__categories-items">
                                <a href="#" class="widget__categories-link" aria-label="Hosting">Hosting</a>
                            </li>
                            <li class="widget__categories-items">
                                <a href="#" class="widget__categories-link" aria-label="Dedicated Server">Dedicated Server</a>
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

                <!-- Default Widget keyword tags -->
                <div class="widget">
                    <h3 class="fourth-heading">Keywords</h3>

                    <div class="widget__tag">
                        <ul class="widget__tag-list">
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Laravel">Laravel</a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Javascript">Javascript</a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Html">Html</a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Sass">Sass</a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Php">Php</a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Angular">Angular</a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Typescript">Typescript </a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Css">Css </a>
                            </li>
                            <li class="widget__tag-items">
                                <a href="#" class="widget__tag-link" aria-label="Bootstrap">Bootstrap </a>
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
