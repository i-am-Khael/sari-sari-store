<main>
  <div class="container login-register-page">

    <form action="/register" method="post" class="register-form">

      <?php if(isset($errors['csrf_failed'])) : ?>
        <small class="error"><?= $errors['csrf_failed'] ?? '' ?></small>
      <?php endif; ?>

      <input type="text" name="csrf_token" value="<?= htmlspecialchars($csrf_token ?? '', ENT_QUOTES, 'UTF-8') ?>" hidden>

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
          class="<?php if($errors['email'] ?? '') echo 'input-error' ?>"
          type="email" name="email" id="email" required
        >
        <small><?= $errors['email'] ?? '' ?></small>
      </div>

      <div class="text-input">
        <label for="username">Username</label>
        <input
          class="<?php if($errors['username'] ?? '') echo 'input-error' ?>"
          type="text" name="username" id="username" required
        >
        <small><?= $errors['username'] ?? '' ?></small>
      </div>

      <div class="text-input">
        <label for="password">Password</label>
        <input
          class="<?php if($errors['password'] ?? '') echo 'input-error' ?>"
          type="password" name="password" id="password" required
        >
        <small><?= $errors['password'] ?? '' ?></small>
      </div>

      <button>Register</button>

    </form>

  </div>
</main>
