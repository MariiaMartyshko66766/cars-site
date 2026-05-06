function toggleMenu() {
  document.querySelector(".menu").classList.toggle("active");
}

let cars = JSON.parse(localStorage.getItem("cars")) || [
  { brand: "BMW", model: "M3", year: 2022 },
  { brand: "Audi", model: "RS6", year: 2021 },
  { brand: "Mercedes", model: "AMG GT", year: 2023 }
];

function render() {
  const container = document.getElementById("cars");
  container.innerHTML = "";

  cars.forEach((car, index) => {
    const div = document.createElement("div");
    div.className = "card";

    div.innerHTML = `
      <h3>🚗 ${car.brand} ${car.model}</h3>
      <p>📅 Rok: ${car.year}</p>
      <button class="delete" onclick="removeCar(${index})">Usuń</button>
    `;

    container.appendChild(div);
  });

  localStorage.setItem("cars", JSON.stringify(cars));
}

function addCar() {
  const brand = document.getElementById("brand").value;
  const model = document.getElementById("model").value;
  const year = document.getElementById("year").value;

  if (!brand || !model || !year) return;

  cars.push({ brand, model, year });

  document.getElementById("brand").value = "";
  document.getElementById("model").value = "";
  document.getElementById("year").value = "";

  render();
}

function removeCar(index) {
  cars.splice(index, 1);
  render();
}

render();
