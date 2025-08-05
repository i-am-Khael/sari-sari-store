<?php views('components/_html_start_tag.php'); ?>
<?php views('components/nav.php'); ?>
<main class="register-page">
  <div class="form-container">

    <form action="/register/create" method="POST" class="register-form">

      <?php if(isset($errors)) : ?>
        <small><?= $errors['method'] ?></small>
      <?php endif ?>

      <div class="logo-form-container">
        <i class="logo fa-solid fa-cart-shopping"></i>
        <h1>Sari Sari Store</h1>
      </div>
    
      <div class="input-container">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="input-container">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" minlength="8" required>
      </div>

      <button>Register</button>
    
    </form>

  </div>
</main>
<?php views('components/_html_end_tag.php'); ?>

