<main class="dashboard-main-page">

  <?php include_once VIEW_PATH . 'partials/dashboard/sidebar.php' ?>

  <section class="categories">

    <div class="categories-container">
      <div class="categories-header">
        <h1>Categories</h1>
        <input id="add-categories" type="button" value="Add">
      </div>
      <table id="categories-table" class="categories-table display compact">
        <thead>
          <tr>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Category One</td>
            <td>
              <button>Edit</button>
              <button>Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div id="category-modal-container" class="hide">
      <div id="add-category-modal">
        <h2>Add Category</h2>
        <form method="post" action="/dashboard/categories">
          <input type="text" name="csrf_token" value="<?= htmlspecialchars($csrf_token ?? '', ENT_QUOTES, 'UTF-8')?>" hidden>
          <input type="text" name="category" placeholder="Category">
          <button type="submit">Add</button>
          <button id="cancel-category" type="submit">Cancel</button>
        </form>
      </div>
    </div>

  </section>
</main>
