<?php
$footerNavJson = json_decode(file_get_contents('./footer-navigation.json'), true); //load data form json file
?>

</main>
<!-- My footer -->
<footer class="footer">
  <div class="container footer-grid">
    <div class="logo">
      <p class="copyright">
        Copyright © <span class="year">2024</span><br class="copy-trick">
        All rights reserved.
      </p>
      <!-- Social media icons -->
      <ul class="footer-social-icons">
      <li>
          <a href=""><img src="./img/social%20media/facebook.png" alt="facebook" id="face" width="46" height="95"></a>
        </li>
        <li>
          <a href=""><img src="./img/social%20media/twitter.png" alt="twitter" width="60" height="53"></a>
        </li>
        <li>
          <a href=""><img src="./img/social%20media/youtube.png" alt="youtube" width="85" height="60"></a>
        </li>
        <li>
          <a href=""><img src="./img/social%20media/google.png" alt="google" width="60" height="64"></a>
        </li>
        <li>
          <a href=""><img src="./img/social%20media/rss.png" alt="rss" width="60" height="61"></a>
        </li>
      </ul>
      <a href="#">
        <img class="footer-logo" alt="Dobri Dobrev" src="./img/logo.png">
      </a>

    </div>
    <!-- Footer Navigation with foreach loop and if condition and function isset to check if the variable is set-->
    <?php foreach ($footerNavJson['footerNav'] as $navItem) : ?>
      <?php if (isset($navItem['links'])) : ?>
        <nav class="footer-nav">
          <p class="footer-heading"><?= $navItem['title']; ?></p>
          <ul class="footer-list">
            <?php foreach ($navItem['links'] as $link) : ?>
              <li>
                <a class="footer-link" href="<?= $link['url']; ?>" aria-label="<?= $link['ariaLabel']; ?>"><?= $link['text']; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </nav>
        <!-- foreach loop and elseif condition and function isset to check if the variable is set -->
      <?php elseif (isset($navItem['contacts'])) : ?>
        <div class="footer-address">
          <p class="footer-heading"><?= $navItem['title']; ?></p>
          <address class="footer-contacts">
            <p><?= $navItem['contacts']['location']; ?></p>
            <p><a class="footer-link" href="<?= $navItem['contacts']['telephone']['url']; ?>" aria-label="<?= $navItem['contacts']['telephone']['ariaLabel']; ?>"><?= $navItem['contacts']['telephone']['number']; ?></a></p>
            <p><a class="footer-link" href="<?= $navItem['contacts']['email']['url']; ?>" aria-label="<?= $navItem['contacts']['email']['ariaLabel']; ?>"><?= $navItem['contacts']['email']['address']; ?></a></p>
          </address>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</footer>
</body>

</html>