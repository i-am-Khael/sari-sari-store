
<header>
  <nav class="container">

    <a href="/">
      <span><i class="fa-solid fa-sign-hanging"></i></span>
      <span>Sari Sari Store</span>
    </a>

    <ul>
      <li>
        <?php if(!empty($_SESSION)) : ?>
          <a href="/logout">Logout</a>
        <?php endif; ?>
        <?php if(empty($_SESSION)) : ?>
          <a href="/register" class="<?= $_SERVER['REQUEST_URI'] === '/register' ? 'isActive' : '' ?>" >Register</a>
          <a href="/login" class="<?= $_SERVER['REQUEST_URI'] === '/login' ? 'isActive' : '' ?>" >Login</a>
        <?php endif; ?>
      </li>
    </ul>

  </nav>
</header>
