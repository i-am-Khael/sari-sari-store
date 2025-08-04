
<nav>
  <div class="container">
    <a href="/" class="logo-container">
      <i class="logo fa-solid fa-cart-shopping"></i>
      <h1>Sari Sari Store</h1>
    </a>

    <ul class="links">
      <li>
        <a href="/" class="<?= isActive('/') ?>">Home</a>
      </li>
      <li>
        <a href="about" class="<?= isActive('/about') ?>">About</a>
      </li>
      <li>
        <a href="login" class="<?= isActive('/login') ?>">Login</a>
      </li>
      <li>
        <a href="register" class="<?= isActive('/register') ?>">Register</a>
      </li>
    </ul>
  </div>
</nav>