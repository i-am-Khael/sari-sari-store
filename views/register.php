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
        <input
          class="<?php if($email ?? '') echo 'input-error' ?>"
          type="email" name="email" id="email" required
        >
        <small><?= $email ?? '' ?></small>
      </div>

      <div class="text-input">
        <label for="username">Username</label>
        <input
          class="<?php if($username ?? '') echo 'input-error' ?>"
          type="text" name="username" id="username" required
        >
        <small><?= $username ?? '' ?></small>
      </div>

      <div class="text-input">
        <label for="password">Password</label>
        <input
          class="<? if($password ?? '') echo 'input-error' ?>"
          type="password" name="password" id="password" required
        >
        <small><?= $password ?? '' ?></small>
      </div>

      <button>Register</button>

    </form>

  </div>
</main>
