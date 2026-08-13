<main>
  <div class="container login-register-page">

    <form action="/login" method="post" class="login-form">

      <div class="text-input">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
      </div>

      <div class="text-input">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
      </div>

      <button>Login</button>

      <small>No account yet? <a href="/register">Register Here!</a></small>

    </form>

  </div>
</main>
