const app = new (function () {
  this.tbody = document.getElementById("tbody");

  this.listing = () => {
    fetch("../controllers/listing.php")
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
      })
      .catch((error) => {
        console.log(error);
      });
  };
})();
app.listing();
