const app = new (function () {
  this.tbody = document.getElementById("tbody");

  this.listing = () => {
    fetch("../controllers/listing.php")
      .then((response) => response.json())
      .then((data) => {
        this.tbody.innerHTML = "";
        data.forEach((item) => {
          this.tbody.innerHTML += `
            <tr>
                <td>${item.id}</td>
                <td>${item.nombre}</td>
                <td>${item.posicion}</td>
                <td>${item.camiseta}</td>
                <td>
                <a href="javascript:void(0);" class="btn btn-warning btn-sm" onclick="app.edit(${item.id})">Editar</a>
                <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="app.delete(${item.id})">Eliminar</a>
                </td>
            `;
        });
      })
      .catch((error) => {
        console.log(error);
      });
  };
})();
app.listing();
