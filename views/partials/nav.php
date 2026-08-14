
<header>
  <nav class="container">

    <a href="/">
      <span><i class="fa-solid fa-sign-hanging"></i></span>
      <span>Sari Sari Store</span>
    </a>

    <ul>
      <li>
        <a href="/register" class="<?= $_SERVER['REQUEST_URI'] === '/register' ? 'isActive' : '' ?>" >Register</a>
        <a href="/login" class="<?= $_SERVER['REQUEST_URI'] === '/login' ? 'isActive' : '' ?>" >Login</a>
      </li>
    </ul>

  </nav>
</header>
