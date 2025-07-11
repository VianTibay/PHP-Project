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

// Initial call and 5s interval
updateStatus();
setInterval(updateStatus, 5000);

// Fetch inventory data from backend and display bar chart
let chart; // global for updates

function fetchInventoryData() {
  fetch("getInventory.php")
    .then((response) => response.json())
    .then((data) => {
      const labels = data.map(item => item.name);
      const quantities = data.map(item => item.quantity);

      if (chart) {
        chart.data.labels = labels;
        chart.data.datasets[0].data = quantities;
        chart.update();
      } else {
        const ctx = document.getElementById('inventoryChart').getContext('2d');
        chart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: 'Item Quantity',
              data: quantities,
              backgroundColor: 'rgba(255, 206, 86, 0.6)',
              borderColor: 'rgba(255, 206, 86, 1)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      }
    });
}

// Call once and every 10 seconds to simulate updates
fetchInventoryData();
setInterval(fetchInventoryData, 10000);
