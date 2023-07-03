const prodForm = document.querySelector("#ProdForm");
const prodModal = new bootstrap.Modal(document.querySelector("#ProdModal"));

prodForm.addEventListener('submit', async (event) => {
  event.preventDefault();
  event.stopPropagation();
  prodForm.classList.add('was-validated');

  if (!prodForm.checkValidity()) return;

  // Recopila los datos suministrados por el usuario
  const prodFormData = new FormData(event.currentTarget);
  const selectedCategory = prodFormData.get("ProdCategory");
  const idSelectedCategory = categories.find(category => category.name_Category == selectedCategory).id_Category;
  prodFormData.set("CatagoryID", idSelectedCategory)

  if (isEditionMode) {
    console.log("EDICION MODE");
    prodFormData.set("ProdID", datosFila.id_Product)
    await fetch("controller/productHandleEdition.php",{
      method: 'POST',
      body: prodFormData
    });
    products = await getProducts();
    productsTable.clear();
    productsTable.rows.add(products).draw();
   
  } else {
    console.log("REGISTRY MODE");
    await fetch("controller/productHandle.php",{
      method: 'POST',
      body: prodFormData
    });

    products = await getProducts();
    productsTable.clear();
    productsTable.rows.add(products).draw();
  }

  prodModal.toggle();

}, false);

// Resetear modal
$('.modal').on('hidden.bs.modal', function () {
  $(this).find('form').trigger('reset').removeClass('was-validated');
});