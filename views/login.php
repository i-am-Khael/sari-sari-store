<main>
  <div class="container">

    <h1><?= $username ?? null ?></h1>

    <form action="/login" method="post">
      <input type="text" name="username">
      <button>Submit</button>
    </form>

  </div>
</main>
