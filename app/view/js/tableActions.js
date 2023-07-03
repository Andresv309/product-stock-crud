let isEditionMode = false;
let datosFila;

const dataParams =
[{postName: "ProdName", dbName: "name_Product"},
{postName: "ProdStock", dbName: "stock_Product"},
{postName: "ProdCategory", dbName: "name_Category"}
];

$("tbody").on("click", '[data-editar]', function () {
  isEditionMode = true;
  const tabla = $(this.closest('table'));
  const fila = this.closest('tr');
  datosFila = tabla.DataTable().row(fila).data();

  dataParams.forEach(param => {
    document.querySelector(`#${param.postName}`).value = datosFila[param.dbName]
  });

  formLabel.textContent = "Edición";
  formBtn.textContent = "Editar";
})

$("tbody").on("click", '[data-eliminar]', function () {
  const deleteData = {
    table: $(this.closest('table')),
    row: this.closest('tr')
  }

  Swal.fire({
    title: 'Estás Seguro?',
    text: "No podrás revertir esta acción!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Elimínalo!',
    cancelButtonText: 'Cancelar'
  }).then(async (result) => {
    if (result.isConfirmed) {
      deleteEmployee(deleteData);
      Swal.fire(
        'Borrado!',
        'Tu registro ha sido eliminado.',
        'success'
      )
    }
  });
});  

function deleteEmployee({table, row}) {
  console.log("DELETE MODE");
  const rowData = table.DataTable().row(row).data();

  const productFormData = new FormData();
  productFormData.set("ProdID", rowData.id_Product);
  fetch("controller/productHandleDelete.php",{
    method: 'POST',
    body: productFormData
  });

  $(table).DataTable().row(row).remove().draw();
}
