<?php
$headTitle = "Contact Us";
$headDescription = "In this page you will find contact form and my contact details, please feel free to contact me.";
require("head.php");
$pageTitle = "Contact Us"; // Title for the contact page
require('main.php');

$name = "";
$email = "";
$message = "";
$nameError = "";
$emailError = "";
$messageError = "";

// Check if the form is submited
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate name
  if (empty($_POST["name"])) {
    $nameError = "Name is required";
  }else{
    $name= $_POST["name"];
  }

  // Validate email
  if (empty($_POST["email"])) {
    $emailError = "Email is required";
} else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
    }
}

  // Validate message
  if (empty($_POST["textarea"])) {
    $messageError = "Message is required";
  }else {
    $message = $_POST["textarea"]; // Assegna il valore dopo aver superato il controllo
}

  if (empty($nameError) && empty($emailError) && empty($messageError)) {
    // Save data to a text file
    $fileUserForm = "userdataform.txt";
    $fileUserContent = "\nName: {$name}\n" . "Email: {$email}\n" . "Message: {$message} ";
    file_put_contents($fileUserForm, $fileUserContent, FILE_APPEND);

     // Reindirizza alla pagina di ringraziamento o altra destinazione
     header("Location: thank-you.php");
     exit;
  }
}
?>
<section class="contact-section">
  <div class="container">

    <!-- Contact form -->
    <div class="form-box">

      <form action="#" class="form" method="post">
        <div class="marbot-5">
          <h2 class="secondary-heading">Get In Touch</h2>
        </div>
        <div class="form__group">
          <input type="text" class="form__input" placeholder="Full name" id="name" name="name" value="<?= $name ?>">
          <label for="name" class="form__label">Full name</label>
          <span class="form__error"><?= $nameError ?></span>
        </div>
        <div class="form__group">
          <input type="email" class="form__input" placeholder="Email address" id="email" name="email" value="<?= $email ?>">
          <label for="email" class="form__label">Email address</label>
          <span class="form__error"><?= $emailError ?></span>
        </div>
        <div class="form__group">
          <textarea id="textarea" class="form__textarea" placeholder="Message" rows="10" name="textarea"><?= $message ?></textarea>
          <label for="textarea" class="form__label">Message</label>
          <span class="form__error"><?= $messageError ?></span>
        </div>
        <button class="btn btn--orange">Submit</button>
      </form>

      <iframe width="100%" height="375" title="Google map" class="google-map" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
      </iframe>

    </div>

  </div>
</section>

<!-- Footer -->
<?php
require("footer.php");
?>