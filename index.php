<?php
$articlesJson = json_decode(file_get_contents('./articles.json'), true); // load articles data from json file
$servicesJson = json_decode(file_get_contents('./services.json'), true); // load services data from json file

// Sort articles by date from top to bottom
usort($articlesJson['articles'], function ($a, $b) {
  $dateA = DateTime::createFromFormat('Y-m-d', $a['publishedDate']);
  $dateB = DateTime::createFromFormat('Y-m-d', $b['publishedDate']);
  return $dateB <=> $dateA; // Sorts from newest to oldest
});

// Get only the first 6 articles in the home page to not disturb my homepage design
$latestArticles = array_slice($articlesJson['articles'], 0, 6);

// I set variables from head.php and iclude on each page to set different Title and description (Seo purpose)
$headTitle = "Web Developer";
$headDescription = "Full stack web developer.
Greetings! I'm Dobri Dobrev , a passionate and innovative web developer
 with a knack for turning ideas into digital reality. 
 Let me take you on a journey through my professional story.";

// include head
require("head.php");
?>

<!-- Hero Section that is unique for my homepage-->
<section class="hero-section" id="#hero">
  <div class="hero-container">
    <div class="big-hero-box btn--from-left">
      <!-- Title -->
      <h1 class="big-hero-title">
        Full stack web development every single day
      </h1>
      <!-- Description  -->
      <p class="hero-description">
        Greetings! I'm <strong> Dobri Dobrev </strong>, a passionate and
        innovative web developer with a knack for turning ideas into
        digital reality. Let me take you on a journey through my
        professional story.
      </p>
      <!-- Buttons -->
      <div class="hero-buttons">
        <a href="#contacts" class="btn btn--from-left-2 btn--purple" aria-label="say hello button">Say Hello</a>
        <a href="#my-works" class="btn btn--from-right-2 btn--brown" aria-label="my works button">My Works</a>
      </div>
      <!-- Social media icons -->
      <p class="social-text btn--from-bottom">Follow me on Social media</p>
      <ul class="social-icons btn--from-bottom">
        <li>
          <a href=""><img src="./img/social%20media/facebook.png" alt="facebook" id="face"></a>
        </li>
        <li>
          <a href=""><img src="./img/social%20media/twitter.png" alt="twitter"></a>
        </li>
        <li>
          <a href=""><img src="./img/social%20media/youtube.png" alt="youtube"></a>
        </li>
        <li>
          <a href=""><img src="./img/social%20media/google.png" alt="google"></a>
        </li>
        <li>
          <a href=""><img src="./img/social%20media/rss.png" alt="rss"></a>
        </li>
      </ul>
    </div>
    <!-- Big Hero Image -->
    <picture>
      <!-- <source srcset="./img/web-developer-img.png" media="(max-width:37.5em)"> -->
      <img src="./img/web-developer-img.png" class="myphoto btn--from-right" alt="My Foto" title="Dobri Dobrev">
    </picture>
  </div>
</section>

<!-- Featured section -->

<section class="featured-section">
  <div class="container">
    <h2 class="heading-featured-in">As featured in</h2>
    <div class="logos">
      <img src="./img/logos/techcrunch.png" alt="Techcrunch logo">
      <img src="./img/logos/business-insider.png" alt="Business Insider logo">
      <img src="./img/logos/the-new-york-times.png" alt="The New York Times logo">
      <img src="./img/logos/forbes.png" alt="Forbes logo">
      <img src="./img/logos/usa-today.png" alt="USA Today logo">
    </div>
  </div>
</section>

<!-- Works Section -->
<!-- At this point i will not include it in Json file and convert
 the data from static to dynamic because i will not use it in other pages. 
 It remain static for my homepage -->

<section class="work-section" id="my-works">
  <div class="container">
    <span class="sub-heading">My Works</span>
    <h2 class="secondary-heading">Web Development Work</h2>
  </div>
  <div class="container">

    <!-- First work -->

    <div class="box-work ">
      <div class="front-end">
        <p class="work-number">01</p>
        <h3 class="work-heading-title">Front-End</h3>
        <p class="work-description">
          Description: Front-end developers focus on the user interface and
          experience. They bring designs to life by coding in HTML, CSS, and
          JavaScript, ensuring that websites look visually appealing and
          function smoothly for end-users.
        </p>
      </div>
      <picture>
        <!-- <source srcset="./img/works/front-end.png" media="(max-width:37.5em)"> -->
        <img src="./img/works/front-end.png" alt="Front-end development" class="work-images">
      </picture>

    </div>

    <!-- Second Work -->

    <div class="box-work">
      <picture>
        <!-- <source srcset="./img/works/back-end.png" media="(max-width:37.5em)"> -->
        <img src="./img/works/back-end.png" alt="Back-end development" class="work-images">
      </picture>

      <div class="front-end">
        <p class="work-number">02</p>
        <h3 class="work-heading-title">Back-End</h3>
        <p class="work-description">
          Back-end developers work behind the scenes to build server-side
          logic, databases, and application functionality. They are
          responsible for handling data, ensuring server performance, and
          integrating various systems to make the website function
          seamlessly.
        </p>
      </div>

    </div>

    <!-- Third Work -->

    <div class="box-work ">
      <div class="front-end">
        <p class="work-number">03</p>
        <h3 class="work-heading-title">Fullstack</h3>
        <p class="work-description">
          Full-stack developers have expertise in both front-end and
          back-end development. They can handle the entire web development
          process, from designing user interfaces to managing databases and
          server-side scripting. Full-stack developers provide end-to-end
          solutions.
        </p>
      </div>
      <picture class="picture">
        <!-- <source srcset="./img/works/full-stack.png" media="(max-width:37.5em)"> -->
        <img src="./img/works/full-stack.png" alt="Fullstack development" class="work-images">
      </picture>

    </div>
  </div>
</section>

<!-- Section Blog -->

<section class="blog-section" id="blog">
  <div class="container">
    <span class="sub-heading">Blog</span>
    <h2 class="secondary-heading">Latest Articles</h2>
  </div>
  <div class="container">

    <!-- All Articles that i include in json file to generate dynamic data ,
  because in this section i will show only the latest 6 articles sorted by date from new to old -->

    <div class="blog-articles">
      <?php foreach ($latestArticles as $article) : ?>
        <article class="article art-<?= $article['id'] ?>">
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

<!-- Service section -->
<div id="services" class="container martop-big center-text">
  <span class="sub-heading">Services</span>
  <h2 class="secondary-heading">Web Development</h2>
</div>
<section class="service-section">
  <div class="container">

    <!-- All services that i include in json file to generate dynamic data.
     I decide to give access to each service directly from my homepage-->

    <div class="service-box ">
      <?php foreach ($servicesJson['services'] as $service) : ?>
        <div class="text-box">
          <h3 class="heading-service">
            <a href="work.php?id=<?= $service['id'] ?>" class="service-link" aria-label="Services"><?= $service['title'] ?></a>
          </h3>
          <p class="service-description"><?= $service['description'] ?></p>
          <picture>
            <img src="<?= $service['imageUrl'] ?>" alt="<?= $service['title'] ?>" class="gallery-img">
          </picture>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Subscribe CTA Section -->
<section class="subscribe-section" id="contacts">
  <div class="container">
    <div class="cta">

      <div class="cta__box">
        <h2 class="secondary-heading">
          Newsletter
        </h2>
        <p class="cta__text">
          Get latest news, updates, tips and trics in your inbox.
        </p>

        <!-- Newsletter form only in the homepage -->
        <form action="#" class="cta__form" method="post">
          <div>
            <label class="cta__label" for="full-name">Full Name</label>
            <input class="cta__input" id="full-name" type="text" placeholder="John Wick" required>
          </div>
          <div>
            <label class="cta__label" for="email">Email address</label>
            <input class="cta__input" id="email" type="email" placeholder="your-email@example.com" required>
          </div>
          <div>
            <label class="cta__label" for="select-where">Where did you here for us?</label>
            <select class="cta__select" name="select-where" id="select-where" required>
              <option value="">Please choose one option</option>
              <option value="google">Google Search</option>
              <option value="facebook">Facebook</option>
              <option value="podcast">Podcast</option>
              <option value="friends">Friends and family</option>
              <option value="youtube">Youtube</option>
              <option value="other">Other</option>
            </select>
          </div>
          <button class="cta__btn">Subscribe Now</button>
        </form>
      </div>
      <img src="./img/Dobri-Dobrev.png" class="cta__img-box" alt="Developer Dobri Dobrev">

    </div>
  </div>
</section>



<!-- Footer  -->

<?php
require("footer.php");
?>