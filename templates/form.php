<?php 

if (!defined('ABSPATH')) {
     exit;
}
// redirect the the http://localhost:8888/contact-confirmation

$redirect_url = 'http://localhost:8888/contact-confirmation';

if ($_SESSION['name'] && $_SESSION['email'] && $_SESSION['telephone']) {
    echo 'Thank you for your message. We will contact you soon.';

    echo '<br>';
     echo $_SESSION['name'];
     echo '<br>';
     echo $_SESSION['email'];
     echo '<br>';
     echo $_SESSION['telephone'];
     echo '<br>';
     echo '<a href="' . $redirect_url . '">Back</a>';

     session_destroy();
}


?>

<?php

if (!$_SESSION['name'] && !$_SESSION['email'] && !$_SESSION['telephone']) ?>


<form method = "post" >
     <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name="name" id="name" class="form-control" required>
     </div>
     <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email" id="email" class="form-control" required>
     </div>
     <div class="form-group">
          <label for="telephone">Telephone:</label>
          <input type="tel" name="telephone" id="telephone" class="form-control" required>
     </div>

     <button type="submit" class="btn btn-primary">Send</button>
</form>
<?php









