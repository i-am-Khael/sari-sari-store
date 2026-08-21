
const table = new DataTable('#categories-table');

const addCategoryButton = document.getElementById('add-categories');
const addCategoryModal = document.getElementById('category-modal-container');
const cancelAddCategoryButton = document.getElementById('cancel-category');

addCategoryButton?.addEventListener('click', () => {
  addCategoryModal.classList.remove('hide');
  addCategoryModal.classList.add('show');
})

cancelAddCategoryButton?.addEventListener('click', (event) => {
  event.preventDefault();
  addCategoryModal.classList.remove('show');
  addCategoryModal.classList.add('hide');
})
