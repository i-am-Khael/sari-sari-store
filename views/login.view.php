<?php views('components/_html_start_tag.php'); ?>
<?php views('components/nav.php'); ?>
<main class="register-page">
  <div class="form-container">

    <form action="" method="post" class="login-form">

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
        <input type="password" name="password" placeholder="Password" required>
      </div>

      <button>Login</button>
    
    </form>

  </div>
</main>
<?php views('components/_html_end_tag.php'); ?>

