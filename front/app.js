// Globals
let showAddForm = "none";
const productsTable = document.querySelector("#productsTable");
const addForm = document.querySelector("#addForm");
const toggleFormBtn = document.querySelector("#toggleFormBtn");
const searchProduct = document.querySelector("#search");
const msgDiv = document.querySelector(".msg");
let allProducts = [];

const createTable = products => {
  productsTable.innerHTML = "";
  let trs = `
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Factory</th>
            </tr>
        </thead>
        <tbody>
        `;

  products.forEach(product => {
    trs += `
            <tr>
                <td>${product.name}</td>
                <td>${product.description}</td>
                 <td>${product.price}</td>
                <td>${product.factory_name}</td>
            <tr>`;
  });

  trs += `<tbody>`;
  productsTable.innerHTML = trs;
};

// Hide Form
addForm.style.display = showAddForm;

// Toggle Form
toggleFormBtn.addEventListener("click", () => {
  showAddForm = showAddForm === "block" ? "none" : "block";
  addForm.style.display = showAddForm;
  toggleFormBtn.textContent =
    showAddForm === "none" ? "Show Add Form" : "Hide Add Form";
});

// Fetch all data
axios.get("http://localhost/api/product/read.php").then(results => {
  allProducts = results.data.records;
  createTable(results.data.records);
});

// Add Product to database
addForm.addEventListener("submit", e => {
  e.preventDefault();

  const select = document.querySelector("#factory_id");
  const name = e.target.name.value;
  const description = e.target.description.value;
  const price = e.target.price.value;
  const factory_id = select.options[select.selectedIndex].value;

  // Simple form validation
  if (name === "" || description === "" || price === "" || factory_id === "") {
    msgDiv.className += " alert alert-danger text-center";
    msgDiv.textContent = "Please fill in the form";
    setInterval(() => {
      msgDiv.className = "msg";
      msgDiv.textContent = "";
    }, 3000);
  } else {
    const product = {
      name,
      description,
      price,
      factory_id
    };
    axios
      .post("http://localhost/api/product/create.php", product)
      .then(response => {
        addForm.reset();
        axios.get("http://localhost/api/product/read.php").then(results => {
          createTable(results.data.records);
        });
      })
      .catch(err => console.log(err));
  }
});

// Search By Name
searchProduct.addEventListener("keyup", e => {
  let userInput = e.target.value.toLowerCase();
  filteredProducts = allProducts.filter(product =>
    product.name.toLowerCase().includes(userInput)
  );
  createTable(filteredProducts);
});
