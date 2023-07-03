categoriesFilter.addEventListener("change", async (event) => {

  const selectedCategoryName = event.target.value;
  const selectedCategory = categories.find(category => category.name_Category == selectedCategoryName);
  const idSelectedCategory = selectedCategory ? selectedCategory.id_Category : 0;

  const filterProducts = idSelectedCategory === 0 ? products : 
    products.reduce((accumulator, product) => {
      if (product.id_Category ===  idSelectedCategory) accumulator.push(product);
      return accumulator;
    },
    []
  );

  productsTable.clear();
  productsTable.rows.add(filterProducts).draw();
})
