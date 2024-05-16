<?php
if ($_SESSION['name'] && $_SESSION['email'] && $_SESSION['telephone']) {
?>
     <h1>Thank you for your submission!</h1>
     <p>Name: <?php echo $_SESSION['name']; ?></p>
     <p>Email: <?php echo $_SESSION['email']; ?></p>
     <p>Telephone: <?php echo $_SESSION['telephone']; ?></p>
<?php
// a button to return to the form
?>
     <a href="<?php echo site_url('/sample-page'); ?>" class="btn btn-primary">Edit</a>
<?php
}
?>
