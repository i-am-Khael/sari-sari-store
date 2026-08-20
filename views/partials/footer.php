<?php if (!isset($_SESSION['role']) || $_SESSION['role'] === 'common') : ?>
<footer>
  <div class="container">
    <p>footer</p>
  </div>
</footer>
<?php endif; ?>
