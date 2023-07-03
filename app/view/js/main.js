const btnRegistry = document.querySelector("#btnRegistry");
const formLabel = document.querySelector("#formLabel");
const formBtn = document.querySelector("#formBtn");
const categoriesSelect = document.querySelector("#ProdCategory");
const categoriesFilter = document.querySelector("#CategoriesFilter");
let categories;
let products;
let productsTable;

loadPage();

async function loadPage() {
  products = await getProducts();
  categories = await getCategories();

  drawProductsTable(products);
  drawCategoriesSelect(categories);
}

async function getCategories() {
  return fetch("controller/categoryHandle.php")
    .then(res => res.json())
    .then(data => data);
};

async function getProducts() {
  return fetch("controller/productHandle.php")
    .then(res => res.json())
    .then(data => data);
};

function drawProductsTable(products) {
    productsTable = $("#ProdTable").DataTable({
    data: products,
    columns: [
      {
        "data": "name_Product"
      },
      {
        "data": "stock_Product"
      },
      {
        "data": "name_Category"
      },
      {
        "data": null,
        "render": (data) => `<div class="btn-group">
                            <button data-editar type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ProdModal"><i class="bi bi-pencil"></i></button>
                            <button data-eliminar type="button" class="btn btn-danger"><i class="bi bi-x-square"></i></button>
                            </div>`
      }
    ]
  })
}

function drawCategoriesSelect(categoriesData) {
  drawSelect(categoriesData, categoriesSelect, `<option selected disabled></option>`);
  drawSelect(categoriesData, categoriesFilter, `<option selected>Todos</option>`);
};

function drawSelect(data, selectElement, defaultOption) {
  const fragment = document.createDocumentFragment();
  data.forEach(item => {
    const option = document.createElement("option");
    option.textContent = item.name_Category;
    fragment.appendChild(option);
  });
  selectElement.replaceChildren(fragment); 
  selectElement.insertAdjacentHTML('afterbegin', defaultOption);
};

btnRegistry.addEventListener("click", () => {
  isEditionMode = false;
  formLabel.textContent = "Registro";
  formBtn.textContent = "Registrar";
})
