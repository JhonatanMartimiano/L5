window.addEventListener("load", () => {
  const branchesRender = async () => {
    let branchesAvailable = document.querySelector("#available .row"),
      branchesOffline = document.querySelector("#offline .row"),
      branchesCalling = document.querySelector("#calling .row"),
      branchesOccupied = document.querySelector("#occupied .row"),
      branchesPaused = document.querySelector("#paused .row");

    await axios
      .get("http://localhost/assets/lib/Branch.Ajax.php")
      .then((response) => {
        branchesAvailable.innerHTML = "";
        branchesOffline.innerHTML = "";
        branchesCalling.innerHTML = "";
        branchesOccupied.innerHTML = "";
        branchesPaused.innerHTML = "";

        for (let i in response.data) {
          if (response.data[i].status == "available") {
            branchesAvailable.innerHTML += /* html */ `<div class="col-lg-2 col-md-3 col-sm-12 border rounded mr-2 mt-2">
              <div>${response.data[i].name}</div>
              <span class="${response.data[i].status} icon-posicion"></span>
              <p>${response.data[i].user}</p>
            </div>`;
          }
          if (response.data[i].status == "offline") {
            branchesOffline.innerHTML += /* html */ `<div class="col-lg-2 col-md-3 col-sm-12 border rounded bg-offline mr-2 mt-2">
              <div>${response.data[i].name}</div>
              <span class="${response.data[i].status} icon-posicion"></span>
              <p>${response.data[i].user}</p>
            </div>`;
          }
          if (response.data[i].status == "calling") {
            branchesCalling.innerHTML += /* html */ `<div class="col-lg-2 col-md-3 col-sm-12 border rounded mr-2 mt-2">
              <div>${response.data[i].name}</div>
              <span class="${response.data[i].status} icon-posicion"></span>
              <p>${response.data[i].user}</p>
            </div>`;
          }
          if (response.data[i].status == "occupied") {
            branchesOccupied.innerHTML += /* html */ `<div class="col-lg-2 col-md-3 col-sm-12 border rounded mr-2 mt-2">
              <div>${response.data[i].name}</div>
              <span class="${response.data[i].status} icon-posicion"></span>
              <p>${response.data[i].user}</p>
            </div>`;
          }
          if (response.data[i].status == "paused") {
            branchesPaused.innerHTML += /* html */ `<div class="col-lg-2 col-md-3 col-sm-12 border rounded mr-2 mt-2">
              <div>${response.data[i].name}</div>
              <span class="${response.data[i].status} icon-posicion"></span>
              <p>${response.data[i].user}</p>
            </div>`;
          }
        }

        axios
          .post("http://localhost/assets/lib/Branch.Ajax.php", {
            branches: response.data,
          })
          .then()
          .catch((error) => console.error(error));
      })
      .catch((error) => console.error(error));
  };

  branchesRender();

  setInterval(() => {
    branchesRender();
  }, 10000);
});
