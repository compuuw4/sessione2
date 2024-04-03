<?php
$headTitle = "Services"; 
$headDescription = "In this page I will show you all my services with details. Please check and feel free to contact me.";
require("head.php");
$servicesJson = json_decode(file_get_contents('./services.json'), true);  //load json data from the file
$pageTitle = "Services"; // Title for my services page
require('main.php');
?>

<section class="page-section">
  <div class="container">
    <div class="center-text">
      <span class="sub-heading">Services</span>
      <h2 class="secondary-heading">Web Development</h2>
    </div>

    <!-- All services  with foreach loop to insert dynamic data using json file.
   It looks like the same in the home page but in next update
    i will include more html components combined with javascript to this page  -->

    <div class="service-box martop-big">
      <?php foreach ($servicesJson['services'] as $service) : ?>
        <div class="text-box">
          <h3 class="heading-service">
            <a href="work.php?id=<?= $service['id'] ?>" class="service-link"><?= $service['title'] ?></a>
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

<!-- Footer -->
<?php
require("footer.php");
?>