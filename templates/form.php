<?php
if (!defined('ABSPATH')) {
     exit;
}
?>

<?php
if (!$_SESSION['name'] && !$_SESSION['email'] && !$_SESSION['telephone']) : ?>


     <form method="post">
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

<?php else : ?>
     <?php
     $name = $_SESSION['name'];
     $email = $_SESSION['email'];
     $telephone = $_SESSION['telephone'];
     ?>
     <h1>OI</h1>
     <form method="post">
          <?php
          $saved_data = get_option('fmv_data');
          ?>
          <div class="form-group">
               <label for="name">Name:</label>
               <input type="text" name="name" id="name" class="form-control" required value="<?php echo  $name; ?>">
          </div>
          <div class="form-group">
               <label for="email">Email:</label>
               <input type="email" name="email" id="email" class="form-control" required value="<?php echo  $email; ?>">
          </div>
          <div class="form-group">
               <label for="telephone">Telephone:</label>
               <input type="tel" name="telephone" id="telephone" class="form-control" required value="<?php echo  $telephone; ?>">
          </div>

          <button type="submit" class="btn btn-primary">Edit</button>
     </form>

<?php endif; ?>