let items = [];

function addItem() {
  const item = document.getElementById("item").value;
  const quantity = parseInt(document.getElementById("quantity").value);
  const price = getPrice(item);

  if (item === "0" || isNaN(quantity)) {
    return;
  }

  const newItem = {
    item,
    quantity,
    price
  };

  items.push(newItem);

  const table = document.getElementById("table");
  const row = table.insertRow(-1);
  const itemCell = row.insertCell(0);
  const quantityCell = row.insertCell(1);
  const priceCell = row.insertCell(2);
  const actionCell = row.insertCell(3);

  itemCell.innerHTML = item;
  quantityCell.innerHTML = quantity;
  priceCell.innerHTML = price;
  actionCell.innerHTML = '<button type="button" onclick="removeItem(this)">Remove</button>';

  document.getElementById("item").value = "0";
  document.getElementById("quantity").value = "";
}

function removeItem(button) {
  const row = button.parentNode.parentNode;
  const index = row.rowIndex - 1;

  items.splice(index, 1);
  row.parentNode.removeChild(row);
}

function getPrice(item) {
  switch (item) {
    case "Veg Biryani":
      return 180;
    case "Panner Biryani":
      return 250;
    case "Veg Manuchuria":
      return 200;
    case "French fries":
      return 120;
   case "Coffee":
      return 45;
   case "Ice Cream":
      return 80;
    default:
      return 0;
  }
}

function calculateTotal() {
  let total = 0;

  items.forEach((item) => {
    total += item.quantity * item.price;
  });

  const totalDiv = document.getElementById("total");
  totalDiv.innerHTML = `total: Rs ${total.toFixed(2)}`;
}
