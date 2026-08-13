<main>
  <div class="container login-register-page">

    <form action="/register" method="post" class="register-form">

      <div class="fullname-container">
        <div class="text-input">
          <label for="firstName">First Name</label>
          <input type="text" name="firstName" id="firstName" required>
        </div>

        <div class="text-input">
          <label for="lastName">Last Name</label>
          <input type="text" name="lastName" id="lastName" required>
        </div>
      </div>

      <div class="text-input">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
      </div>

      <div class="text-input">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
      </div>

      <div class="text-input">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
      </div>

      <button>Register</button>

    </form>

  </div>
</main>
