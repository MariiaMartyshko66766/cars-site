function toggleMenu() {
  document.querySelector(".menu").classList.toggle("active");
}

fetch("data.json")
  .then(res => res.json())
  .then(data => {
    const container = document.getElementById("cars-container");

    data.forEach(car => {
      const div = document.createElement("div");
      div.className = "card";

      div.innerHTML = `
        <h3>${car.brand} ${car.model}</h3>
        <p>Rok: ${car.year}</p>
      `;

      container.appendChild(div);
    });
  });
