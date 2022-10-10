const app = new (function () {
  this.tbody = document.getElementById("tbody");
  this.id = document.getElementById("id");
  this.nombre = document.getElementById("nombre");
  this.posicion = document.getElementById("posicion");
  this.camiseta = document.getElementById("camiseta"); // TODO
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

  this.save = () => {
    var form = new FormData();
    form.append("nombre", this.nombre.value);
    form.append("posicion", this.posicion.value);
    form.append("camiseta", this.camiseta.value);
    form.append("id", this.id.value);
    if (this.id.value === "") {
      fetch("../controllers/save.php", {
        method: "POST",
        body: form,
      })
        .then((response) => response.json())
        .then((data) => {
          alert("Creado con exito");
          this.listing();
          this.clean();
        })
        .catch((error) => console.log(error));
    } else {
      fetch("../controllers/update.php", {
        method: "POST",
        body: form,
      })
        .then((response) => response.json())
        .then((data) => {
          alert("Actualizado con exito");
          this.listing();
          this.clean();
        })
        .catch((error) => console.log(error));
    }
  };

  this.clean = () => {
    this.id.value = "";
    this.nombre.value = "";
    this.posicion.value = "";
    this.camiseta.value = "";
  };

  this.delete = (id) => {
    var form = new FormData();
    form.append("id", id);
    fetch("../controllers/delete.php", {
      method: "POST",
      body: form,
    })
      .then((response) => response.json())
      .then((data) => {
        alert("Eliminado con exito");
        this.listing();
        this.clean();
      })
      .catch((error) => {
        console.log(error);
      });
  };

  this.edit = (id) => {
    var form = new FormData();
    form.append("id", id);
    fetch("../controllers/edit.php", {
      method: "POST",
      body: form,
    })
      .then((response) => response.json())
      .then((data) => {
        this.id.value = data.id;
        this.nombre.value = data.nombre;
        this.posicion.value = data.posicion;
        this.camiseta.value = data.camiseta;
      })
      .catch((error) => {
        console.error(error);
      });
  };
})();
app.listing();
