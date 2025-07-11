const greetingsList = [
    "Welcome! to Inventory System",
    "Hello! User 👋",
    "Ready to manage your stock?",
    "Inventory Control Panel",
    "Add or track items easily"
  ];

  const greetingsEl = document.getElementById("greetings");
  let i = 0;

  function rotateGreeting() {
    greetingsEl.textContent = greetingsList[i];
    i = (i + 1) % greetingsList.length;
  }

  rotateGreeting(); // First run
  setInterval(rotateGreeting, 2000); // Change every 4 seconds