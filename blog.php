<?php
$headTitle = "Blog Articles";
$headDescription = "Full stack web developer.
  Greetings! I'm Dobri Dobrev , a passionate and innovative web developer
   with a knack for turning ideas into digital reality. 
   Let me take you on a journey through my professional story.";
require("head.php");
$articleJson = json_decode(file_get_contents('./articles.json'), true); //load data from json file

// Sort articles by date from newest to oldest trough json file
usort($articleJson['articles'], function ($a, $b) {
  $dateA = DateTime::createFromFormat('Y-m-d', $a['publishedDate']);
  $dateB = DateTime::createFromFormat('Y-m-d', $b['publishedDate']);
  return $dateB <=> $dateA;  
});

/* Default section with the image after navigation  */
 $pageTitle = "Blog Articles"; // Title for the services page
require('main.php'); 
?>

<!-- Section Blog -->

<section class="blog-section" id="blog">
  <div class="container">
    <span class="sub-heading">Blog</span>
    <h2 class="secondary-heading">Web Articles</h2>
  </div>
  <div class="container">

  <!-- All Articles -->
    <div class="blog-articles">
      <!--  Using loop foreach to display all posts( on the top are the latests using a sort function) -->
      <?php foreach ($articleJson['articles'] as $article) : ?>
        <article class="article <?= $article['id'] ?>">
          <img src="<?= $article['imageUrl'] ?>" alt="<?= $article['title'] ?>" class="blog-imgs">
          <div class="blog-box">
            <div class="blog-tags">
              <div>
                <span class="tag"><?= implode(', ', $article['tags']) ?></span>
              </div>
              <div>
                <span class="published">Published on <?= $article['publishedDate'] ?></span>
              </div>
            </div>
            <h2 class="h2-center"><?= $article['title'] ?></h2>
            <p class="paragraf-description"><?= $article['description'] ?></p>
            <a href="article.php?id=<?= $article['id'] ?>" class="read-more" aria-label="Read more">Read More ...</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Footer  -->

<?php
require("footer.php");
?>