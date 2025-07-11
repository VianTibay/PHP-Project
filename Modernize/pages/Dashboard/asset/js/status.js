// Real-time status message update
const statusText = document.getElementById("realtimeStatus");

const messages = [
  "Checking inventory status...",
  "No recent updates found.",
  "New item added successfully.",
  "Item quantity updated.",
  "Inventory synced with database.",
  "Idle... waiting for next update."
];

function updateStatus() {
  const randomIndex = Math.floor(Math.random() * messages.length);
  statusText.textContent = messages[randomIndex];
}

// Initial call and repeat every 5 seconds
updateStatus();
setInterval(updateStatus, 5000);

// Chart setup
let chart;

function fetchInventoryData() {
  fetch("getInventory.php") // must point to your actual PHP backend
    .then(response => response.json())
    .then(data => {
      const labels = data.map(item => item.name);
      const quantities = data.map(item => item.quantity);

      const ctx = document.getElementById("inventoryChart").getContext("2d");

      if (chart) {
        chart.data.labels = labels;
        chart.data.datasets[0].data = quantities;
        chart.update();
      } else {
        chart = new Chart(ctx, {
          type: "bar",
          data: {
            labels: labels,
            datasets: [{
              label: "Item Quantity",
              data: quantities,
              backgroundColor: "rgba(54, 162, 235, 0.6)",
              borderColor: "rgba(54, 162, 235, 1)",
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      }
    })
    .catch(err => {
      console.error("Error fetching inventory:", err);
    });
}

// Load chart data once and refresh every 10 seconds
fetchInventoryData();
setInterval(fetchInventoryData, 10000);
